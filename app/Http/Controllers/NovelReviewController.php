<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NovelReview;
use Auth;

class NovelReviewController extends Controller
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
    public function store(Request $request, $novel_id)
    {
        $this->validate($request, [
          'content' => 'required'
        ]);

        $review = new NovelReview();
        $review->content = $request->input('content');
        $review->novel_id = $novel_id;
        $review->user_id = Auth::id();

        $review->save();
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
        return view('novelReview.edit')->with('review', NovelReview::find($id));
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

      $review = NovelReview::find($id);
      $review->content = $request->input('content');
      
      $review->save();
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
      NovelReview::destroy($id);
      return redirect('/profile');
    }
}
