@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <article class="chapter col-md-8">
      <h1 class="chapter-title"><a href="{{ route('chapters.show', ['chapter' => $chapter->id]) }}"> {{ $chapter->title }}</a></h1>
      <h2 class="chapter-number">Chapter {{ $chapter->number }}</h2>
      <small>by : {{ $chapter->novel->user->name }}</small> <!-- add user profile link later -->
      <form method="post" action="{{route('chapters.destroy', ['chapter' => $chapter->id])}}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-primary">Delete chapter</button>
      </form>
      <a href="{{ route('chapters.edit', ['chapter' => $chapter->id]) }}" class="btn btn-primary">edit chapter</a>
      <p class="chapter-content"> {{ $chapter->content }} </p>
    </article>


    <article class="chapter-comments col-md-8">
      <h2 class="comments">Comments</h2>
      @foreach ($chapter->comments as $comment)
        <section>
          <small> {{$comment->user->name}} </small>
          <p class="comment"> {{$comment->content}} </p>
          <a href="{{route('chapterComments.edit', ['ChapterComment' => $comment->id])}}">edit</a>
        </section>
      @endforeach
      <section>
        <h3>Add a comment</h3>
        <form method="post" action="{{route('chapterComments.store', ['chapter_id' => $chapter->id])}}">
          @csrf
          <textarea name="content" type="text" class="form-control" placeholder="Write your comment here"></textarea>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </section>
    </article>

  </div>


</div>
@endsection
