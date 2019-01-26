@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <form method="post" action="{{route('chapters.store')}}">
        @csrf
        <div class="form-group">
          <label for="title">chapter title</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="content">Chapter content</label>
          <textarea name="content" type="text" class="form-control" id="content" placeholder="Write your chapter here"></textarea>
        </div>
        <input type="hidden" name="novel_id" value="{{$novel_id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>
  @if ($errors->any())
  <ul id="errors">
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  @endif
</div>


@endsection
