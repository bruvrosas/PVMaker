<?php
/*
Auteur: Bruno Manuel Vieira Rosas
Date: 19.05.2022
Description: Folder resource controller
*/
namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Report;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\TagFactory;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            $folders = Auth::user()->folders;
            return view('folders.index')->with([
                'folders' => $folders,
                'tags' => Tag::all()
            ]);
        }
        else
        {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            return view('folders.create');
        }
        else
        {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = new Folder;
        $folder->name = $request->name;
        $folder->user_id = Auth::user()->id;
        $folder->save();
        return redirect()->route('folders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()){
            $folder = Folder::find($id);
            return view('folders.edit')->with(['folder' => $folder]);
        }
        else
        {
            return view('auth.login');
        }
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
        if (Auth::check()){
            Folder::where(['id' => $id])->update([
                'name'=>$request->input('name')
            ]);
            return redirect()->route('folders.index');
        }
        else
        {
            return view('auth.login');
        }
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

            Folder::destroy($id);
        }
        return redirect()->route('folders.index');
    }

    public function filter(Request $request)
    {
        //TODO filter
    }
}
