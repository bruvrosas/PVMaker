{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 02.06.2022
Description: Report show page
--}}

@extends('layouts/main')
@section('content')
    <div class="relative inline-flex w-full mx-auto min-h-screen h-full py-4 ">
        <div class="mt-32 mx-auto prose">
            <h1>Procès-verbal: {{$report->title}}</h1>
            <p><strong>Date: </strong>{{$report->date->format('d-m-Y')}}</p>
            <p><strong>Horaire: </strong>{{$report->start_time->format('H:i')}} à {{$report->end_time->format('H:i')}}</p>
            <h3>Participants:</h3>
            @if($report->participants == "")
                <p>Aucun</p>
            @else
                <p>
                    @foreach(explode(';',$report->participants) as $participant)
                        {{ $loop->last ? $participant : $participant . ", " }}
                    @endforeach
                </p>
            @endif
            <h3>Absents:</h3>
            @if($report->absents == "")
                <p>Aucun</p>
            @else
                <p>
                    @foreach(explode(';',$report->absents) as $absent)
                        {{ $loop->last ? $absent : $absent . ", " }}
                    @endforeach
                </p>
            @endif
            <h3>Excusés:</h3>
            @if($report->excused == "")
                <p>Aucun</p>
            @else
                <p>
                    @foreach(explode(';',$report->excused) as $excused)
                        {{ $loop->last ? $excused : $excused . ", " }}
                    @endforeach
                </p>
            @endif
            <h3>Ordre du jour et points traités:</h3>
            {!! $report->agenda !!}
        </div>
    </div>
@endsection
