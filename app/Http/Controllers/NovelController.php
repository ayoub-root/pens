<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNovelRequest;
use App\Http\Requests\DeleteNovelRequest;
use App\Http\Requests\EditeNovelRequest;
use App\Novel;
use App\Chapter ;
use Auth;

class NovelController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('role:admin|author');
    }

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
        return view('novels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNovelRequest $request)
    {

        $novel = new Novel();
        $novel->title = $request->input('title');
        $novel->description = $request->input('description');
        $novel->user_id = Auth::id();
        $novel->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $novel = Novel::findOrFail($id);
        return view('novels.show')->with('novel', $novel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novel = Novel::find($id);
        $author_id = $novel->user->id;
        if ($author_id === auth()->id()) {
          return view('novels.edit')->with('novel', $novel);
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
    public function update(EditeNovelRequest $request, $id)
    {
      $novel = Novel::find($id);
      $novel->title = $request->input('title');
      $novel->description = $request->input('description');
      $novel->save();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteNovelRequest $request, $id)
    {
        chapter::where('novel_id', $id)->delete();
        Novel::destroy($id);
        return redirect()->back();
    }
}
