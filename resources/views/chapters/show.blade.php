@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <article class="chapter col-md-8">
      <h1 class="chapter-title"><a href="{{ route('chapters.show', ['chapter' => $chapter->id]) }}"> {{ $chapter->title }}</a></h1>
      <h2 class="chapter-number">Chapter {{ $chapter->number }}</h2>
      <small>by : {{ $chapter->novel->user->name }}</small> <!-- add user profile link later -->
      <p class="chapter-content"> {{ $chapter->content }} </p>
    </article>


    <article class="chapter-comments col-md-8">
      <h2 class="comments">Comments</h2>
      @foreach ($chapter->comments as $comment)
        <section>
          <small> {{$comment->user->name}} </small>
          <p class="comment"> {{$comment->content}} </p>
        </section>
      @endforeach
    </article>

  </div>


</div>
@endsection
