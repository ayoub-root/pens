@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <form method="post" action="{{route('novels.update', ['novel' => $novel->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Novel title</label>
          <input name="title" value="{{$novel->title}}" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="description">Novel description</label>
          <textarea name="description" type="text" class="form-control" id="description">{{$novel->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>


@endsection
