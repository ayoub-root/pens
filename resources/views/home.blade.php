@extends('layouts.app')

@section('content')
<div class="container">
  <section class="recent-novels">
    <h1>Recent Novels</h1>
    <div class="row novels">
      @foreach ($novels as $novel)
        <article class="novel col-sm-6 align-content-center">
          <h2 class="novel-title"> <a href="{{ route('novels.show', ['novel' => $novel->id])}}"> {{ $novel->title }}</a></h2>
          <small>by : {{ $novel->user->name }}</small> <!-- add user profile link later -->
          <p class="novel-description "> {{ $novel->makeExcerpt() }} </p>
        </article>
      @endforeach
    </div>
  </section>
</div>
@endsection
