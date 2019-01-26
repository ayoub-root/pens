<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChapterComment;


class ChapterCommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $chapter_id)
    {
      $this->validate($request, [
        'content' => 'required'
      ]);

      $comment = new ChapterComment();
      $comment->content = $request->input('content');
      $comment->chapter_id = $chapter_id;
      $comment->user_id = auth()->id();

      $comment->save();
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
        return view('chapterComment.edit')->with('comment', ChapterComment::find($id));
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
        'content' => 'required'
      ]);

      $comment = ChapterComment::find($id);
      $comment->content = $request->input('content');

      $comment->save();
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
      ChapterComment::destroy($id);
      return redirect('/profile');
    }
}
