@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <form method="post" action="{{route('chapters.update', ['chapter' => $chapter->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">chapter title</label>
          <input name="title" value="{{$chapter->title}}" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="content">Chapter content</label>
          <textarea name="content" type="text" class="form-control" id="content">{{$chapter->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

@endsection
