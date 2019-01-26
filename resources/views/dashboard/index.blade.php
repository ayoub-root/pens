@extends('layouts.app')

@section('content')
<div class="container">
  <section class="user-info">
    <h2 class="user-name">{{$user->name}}</h2>
    <small>membre since : {{ $user->membre_since() }}</small>
  </section>
  <section class="user-novels">
    <h2>My Novels</h2>
    @if ($user->novels->isEmpty())
      <p>You have no Novels yet !</p>
    @else
      @foreach($user->novels as $novel)
        <p class="novel-title"> <a href="{{route('novels.show', ['novel' => $novel->id])}}"> {{$novel->title}} </a></p>
        <form method="post" action="{{route('novels.destroy', ['novel' => $novel->id])}}">
          @method('DELETE')
          @csrf
          <button type="submit">delete novel</button>
        </form>
        <p class="novel-chapters">
          chapters :
          @foreach($novel->chapters as $index => $chapter)
            <span> <a href="{{route('chapters.show', ['chapter' => $chapter->id])}}">{{$index + 1}}</a> </span>
          @endforeach
          <br>
          <a href="{{route('chapters.create', ['novel_id' => $novel->id])}}" type="submit" class="btn">new chapter</a>

        </p>
      @endforeach
    @endif
  </section>
  <section>
    <h2>Crud OPs</h2>
    <li> <a href="{{route('novels.create')}}"> new Novel </a></li>
  </section>
</div>
@endsection
