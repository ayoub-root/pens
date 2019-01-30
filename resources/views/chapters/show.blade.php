@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <article class="chapter col-md-8">
      <h1 class="chapter-title font-weight-bold"><a href="{{ route('chapters.show', ['chapter' => $chapter->id]) }}"> {{ $chapter->title }}</a></h1>
      <h2 class="chapter-number font-weight-bold">Chapter {{ $chapter->number }}</h2>
      <small class="author">by : {{ $chapter->novel->user->name }}</small> <!-- add user profile link later -->
      <form method="post" action="{{route('chapters.destroy', ['chapter' => $chapter->id])}}">
        @method('DELETE')
        @csrf
        <button type="submit"><i class="far fa-trash-alt text-center"></i></button>
      </form>
      <a class="box text-center" href="{{ route('chapters.edit', ['chapter' => $chapter->id]) }}"><i title="edit chapter" class="far fa-edit"></i></a>
      <p class="chapter-content"> {{ $chapter->content }} </p>
    </article>


    <article class="chapter-comments col-md-8">
      @if ($chapter->comments->isEmpty())
        <p class="font-weight-light">No Comments yet</p>
      @else
        <h2 class="comments-title">Comments</h2>
        <p class="reviews-number">{{ $chapter->comments->count() }} comment(s)</p>
        @foreach ($chapter->comments as $comment)
          <section class="comment">
            <small class="comment-author"> {{$comment->user->name}} </small>
            <p class=""> {{$comment->content}} </p>
            <a href="{{route('chapterComments.edit', ['ChapterComment' => $comment->id])}}"><i title="edit comment" class="far fa-edit"></i></a>
          </section>
        @endforeach
      @endif
      <section class="comment-form">
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
