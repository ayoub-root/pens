@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <h2>Edit the review</h2>
      <form method="post" action="{{route('novelReviews.update', ['novelReview' => $review->id])}}">
        @method('PUT')
        @csrf
        <textarea name="content" type="text" class="form-control" placeholder="Write your review here">{{$review->content}}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>


@endsection
