<?php
/*
Auteur: Bruno Manuel Vieira Rosas
Date: 19.05.2022
Description: Report resource controller
*/
namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Tag;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            $tags = Tag::all();
            $folders = Auth::user()->folders;
            return view('reports.create')->with(['tags' => $tags, 'folders' => $folders]);
        }
        else
            return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participants = [];
        $absents = [];
        $excused = [];
        // Filter dynamic fields
        if (!empty($request->participants)) {
            $participants = array_values(array_filter($request->participants));
        }
        if (!empty($request->absents)) {
            $absents = array_values(array_filter($request->absents));
        }
        if (!empty($request->excused)) {
            $excused = array_values(array_filter($request->excused));
        }

        if (Auth::check()){
            // Store report
            $report = new Report;
            $report->title = $request->title;
            $report->date = $request->date;
            $report->start_time = $request->start_time;
            $report->end_time = $request->end_time;
            $report->participants = $this->arrayToString($participants);
            $report->absents = $this->arrayToString($absents);
            $report->excused = $this->arrayToString($excused);
            if ($request->agenda == null)
                $report->agenda = "Vide";
            else
                $report->agenda = $request->agenda;
            $report->folder_id = $request->folder_id;
            $report->save();
            // Handle tags
            if ($request->tags != null)
            {
                $tags_id = explode(",",$request->tags);
                foreach ($tags_id as $tag_id){
                    $tag = Tag::find($tag_id);
                    $tag->reports()->attach($report->id);
                }
            }
            return redirect()->route('folders.index');
        }
        else{
            //Export report as PDF
            $formatDate = (new Carbon($request->date))->format('d-m-Y');
            $this->createReportPDF($request->title,$formatDate,$request->start_time,$request->end_time,$participants,$absents,$excused,$request->agenda);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()){
            $report = Report::find($id);
            return view('reports.show')->with(['report' => $report]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            Report::destroy($id);
        }
        return redirect()->route('folders.index');
    }

    public function import($id)
    {
        if (Auth::check()) {
            $report = Report::find($id);
            return view('reports.import')->with([
                'report'=>$report,
                'tags' => Tag::all(),
                'folders' => Folder::all(),
            ]);
        }
    }

    public function download($id)
    {
        $report = Report::find($id);
        if (Auth::check() && $report->folder->user_id == Auth::user()->id){
            $this->createReportPDF($report->title,$report->date->format('d-m-Y'),$report->start_time->format('H:i'),$report->end_time->format('H:i'),explode(';',$report->participants),explode(';',$report->absents),explode(';',$report->excused),$report->agenda);
            return redirect()->route('folders.index');
        }
    }

    public function compressedDownload(Request $request)
    {
        $tempDir = sys_get_temp_dir();
        $file = $tempDir.'/my-pdf.zip';
        $zip = new \ZipArchive();
        $zip->open($file, ZipArchive::OVERWRITE);
        $reports = Report::all();
        dd($reports);
    }

    // Transforms an array into a string with semicolon separated values
    private function arrayToString($array)
    {
        if (empty($array)){
            return "";
        }
        else{
            $result_string = "";
            $array_count = count($array);
            $i=0;
            foreach ($array as $item) {
                // if last element no comma
                if (++$i === $array_count)
                    $result_string .= $item;
                else
                    $result_string .= $item . ";";
            }
            return $result_string;
        }
    }

    // Creates report PDF
    private function createReportPDF($title,$date,$start_time,$end_time,$participants,$absents,$excused,$agenda)
    {
        $html_content = "";
        $html_style =
                        <<<EOD
                        <style>
                        th{
                            border: 1px solid black;
                            background-color: #6b6b6b;
                            text-align: center;
                            font-weight: bold;
                            color: white;
                        }
                        td {
                            border: 1px solid black;
                            text-align: center
                        }
                        </style>
                        EOD;
        $html_content .= $html_style;
        $data =
            <<<EOD
            <h1>Procès-verbal: $title</h1>
            <p><strong>Date: </strong>$date</p>
            <p><strong>Horaire: </strong>$start_time à $end_time</p>
            EOD;
        $html_content .= $data;

        if (empty($participants)){
            $html_content .= <<<EOD
            <h3>Participants:</h3>
            <p>Aucun</p>
            EOD;
        }
        else{
            $participantString = "";
            $numParticipants = count($participants);
            $i=0;
            foreach ($participants as $p) {
                if (++$i === $numParticipants)
                    $participantString .= $p;
                else
                    $participantString .= $p . ", ";
            }
            $html_content .= <<<EOD
            <h3>Participants:</h3>
            <p>$participantString</p>
            EOD;
        }
        if (empty($absents)){
            $html_content .= <<<EOD
            <h3>Absents:</h3>
            <p>Aucun</p>
            EOD;
        }
        else{
            $absentString = "";
            $numAbsent = count($absents);
            $i=0;
            foreach ($absents as $a) {
                if (++$i === $numAbsent)
                    $absentString .= $a;
                else
                    $absentString .= $a . ", ";
            }
            $html_content .= <<<EOD
            <h3>Absents:</h3>
            <p>$absentString</p>
            EOD;
        }
        if (empty($excused)){
            $html_content .= <<<EOD
            <h3>Excusés:</h3>
            <p>Aucun</p>
            EOD;
        }
        else{
            $excusedString = "";
            $numExcused = count($excused);
            $i=0;
            foreach ($excused as $e) {
                if (++$i === $numExcused)
                    $excusedString .= $e;
                else
                    $excusedString .= $e . ", ";
            }
            $html_content .= <<<EOD
            <h3>Excusés:</h3>
            <p>$excusedString</p>
            EOD;
        }
        $html_content .= <<<EOD
            <h3>Ordre du jour et points traités:</h3>
            $agenda
            EOD;
        // PDF
        PDF::setFooterCallback(function($pdf) {
            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', '', 8);
            // Page number
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
            // Print date
            $now = Carbon::now()->format('d-m-Y h:i:s');
            $pdf->SetY(-15);
            $pdf->Cell(0, 10, 'Imprimé le '. $now, 0, false, 'L', 0, '', 0, false, 'T', 'M');
        });
        PDF::SetTitle($title);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        PDF::Output('PVMaker_' . $title.'.pdf','D');
    }
}
