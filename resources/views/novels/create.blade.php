@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <form method="post" action="{{route('novels.store')}}">
        @csrf
        <div class="form-group">
          <label for="title">Novel title</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="description">Novel description</label>
          <textarea name="description" type="text" class="form-control" id="description" placeholder="give a brief description about the novel"></textarea>
        </div>

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
