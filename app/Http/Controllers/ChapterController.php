<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateChapterRequest;
use App\Http\Requests\DelteChapterRequest;
use App\Http\Requests\EditChapterRequest;
use App\Chapter;
use App\Novel;

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
        if (Novel::where('id', $novel_id)->where('user_id', auth()->id())->exists()) {
          return view('chapters.create')->with('novel_id', $novel_id);
        }
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChapterRequest $request)
    {
        $chapter = new Chapter();
        $chapter->title = $request->input('title');
        $chapter->content = $request->input('content');
        $chapter->novel_id = $request->input('novel_id');
        $chapter->number = Chapter::where('novel_id', $request->input('novel_id'))->count() + 1;

        $chapter->save();
        return redirect()->route('chapters.show', ['chapter' => $chapter->id]);
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
        $chapter = Chapter::find($id);
        $author_id = $chapter->novel->user->id;
        if ($author_id === auth()->id()) {
          return view('chapters.edit')->with('chapter', Chapter::find($id));
        } else {
          return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditChapterRequest $request, $id)
    {
      $chapter = Chapter::find($id);
      $chapter->title = $request->input('title');
      $chapter->content = $request->input('content');
      $chapter->save();

      //return redirect('/profile');
      return redirect()->route('chapters.show', ['chapter' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelteChapterRequest $request, $id)
    {
        Chapter::destroy($id);
        return redirect('/profile');
    }
}
