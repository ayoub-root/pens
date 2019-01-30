@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <article class="novel col-md-8">
      <h1 class="novel-title font-weight-bold"><a href="{{ route('novels.show', ['novel' => $novel->id])}}"> {{ $novel->title }}</a></h1>
      <small class="author">By :</small> <!-- add user profile link later -->
      <p class="novel-description"> {{ $novel->description }} </p>
    </article>


    <article class="col-md-8">
        @if ($novel->chapters->isEmpty())
          <p class="font-weight-light">No chapters yet</p>
        @else
          <h2 class="novel-chapters">Chapters : </h2>
          <ul class="list-group novel-chapters">
            @foreach ($novel->chapters as $chapter)
              <a href="{{ route('chapters.show', ['chapters' => $chapter->id]) }}"><li class="box text-center">{{$chapter->number}} </li></a>
            @endforeach
        @endif
        </ul>
    </article>

    <article class="novel-reviews col-md-8">
      <h2 class="novel-reviews-title">Reviews</h2>
      <div class="novel-info">
        <p class="reviews-number">{{ $novel->reviews->count() }} review(s)</p>
      </div>
      @foreach ($novel->reviews as $review)
        <section class="review">
          <small class="author review-author">  </small>
          <p class="review-content"> {{$review->content}} </p>
          <a href="{{route('novelReviews.edit', ['novelReview' => $review->id])}}"><i class="far fa-edit"></i></a>
        </section>
      @endforeach
      <section class="review-form">
        <h3>Add a review</h3>
        <form method="post" action="{{route('novelReviews.store', ['novel_id' => $novel->id])}}">
          @csrf
          <textarea name="content" type="text" class="form-control" placeholder="Write your review here"></textarea>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </section>
    </article>

  </div>


</div>
@endsection
