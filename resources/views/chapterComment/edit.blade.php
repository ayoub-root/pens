@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <h2>Edit the comment</h2>
      <form method="post" action="{{route('chapterComments.update', ['chapterComment' => $comment->id])}}">
        @method('PUT')
        @csrf
        <textarea name="content" type="text" class="form-control" placeholder="Write your review here">{{$comment->content}}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>


@endsection
