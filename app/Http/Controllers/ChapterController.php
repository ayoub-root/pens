<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;

class ChapterController extends Controller
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
    public function create($novel_id)
    {
        return view('chapters.create')->with('novel_id', $novel_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'content' => 'required'
        ]);

        $chapter = new Chapter();
        $chapter->title = $request->input('title');
        $chapter->content = $request->input('content');
        $chapter->novel_id = $request->input('novel_id');
        $chapter->number = Chapter::where('novel_id', $request->input('novel_id'))->count() + 1;

        $chapter->save();
        return redirect('/profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.show')->with('chapter', $chapter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('chapters.edit')->with('chapter', Chapter::find($id));
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
      $this->validate($request, [
        'title' => 'required',
        'content' => 'required'
      ]);

      $novel = Chapter::find($id);
      $novel->title = $request->input('title');
      $novel->content = $request->input('content');
      $novel->save();

      return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::destroy($id);
        return redirect('/profile');
    }
}
