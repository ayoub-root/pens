@extends('layouts.app')

@section('content')
<div class="container">
  <section class="recent-novels">
    <h1 class="font-weight-bold">Recent Novels</h1>
    <div class="row novels">
      @foreach ($novels as $novel)
        <article class="novel col-md-9 ">
          <h2 class="novel-title font-weight-bold"> <a href="{{ route('novels.show', ['novel' => $novel->id])}}"> {{ $novel->title }}</a></h2>
          <small class="author">By : {{ $novel->user->name }}</small> <!-- add user profile link later -->
          <p class="novel-description "> {{ $novel->makeExcerpt() }} <small><a href="{{ route('novels.show', ['novel' => $novel->id])}}">Read more</a></small></p>
          <div class="novel-info">
            <p class="reviews-number"><i class="far fa-comment"></i>  {{ $novel->reviews->count() }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </section>
</div>
@endsection
