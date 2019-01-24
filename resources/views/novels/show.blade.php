@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <article class="novel col-md-8">
      <h1 class="novel-title"><a href="{{ route('novels.show', ['novel' => $novel->id])}}"> {{ $novel->title }}</a></h1>
      <small>by : {{ $novel->user->name }}</small> <!-- add user profile link later -->
      <p class="novel-description"> {{ $novel->description }} </p>
    </article>


    <article class="novel col-md-8">
      <h2 class="novel-chapters">Chapters : </h2>
      <ul class="list-group">
        @foreach ($novel->chapters as $chapter)
          <li class="list-group-item"> {{$chapter->number}} </li>
        @endforeach
      </ul>
    </article>

    <article class="novel-reviews col-md-8">
      <h2 class="novel-reviews">Reviews</h2>
      @foreach ($novel->reviews as $review)
        <section>
          <small> {{$review->user->name}} </small>
          <p class="review"> {{$review->content}} </p>
        </section>
      @endforeach
    </article>

  </div>


</div>
@endsection
