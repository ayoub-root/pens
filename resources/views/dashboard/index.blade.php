@extends('layouts.app')

@section('content')
<div class="container">

  <section class="user-info">
    <h2 class="user-name">{{$user->name}}</h2>
    <small>membre since : {{ $user->membre_since() }}</small>
  </section>

  <section class="user-novels">
    <h2>My Novels</h2>
    <section>
      <button class="btn"> <a href="{{route('novels.create')}}"><i class="fas fa-plus pr-2"></i>new Novel </a></button>
    </section>
    @if ($user->novels->isEmpty())
      <p>You have no Novels yet !</p>
    @else
      @foreach($user->novels as $novel)
        <section class="novel">
          <p class="novel-title"> <a href="{{route('novels.show', ['novel' => $novel->id])}}"> {{$novel->title}} </a></p>
          <form method="post" action="{{route('novels.destroy', ['novel' => $novel->id])}}">
            @method('DELETE')
            @csrf
            <button title="delete novel" type="submit"><i class="far fa-trash-alt"></i></button>
          </form>
          <p class="novel-chapters">
            chapters :
            @foreach($novel->chapters as $index => $chapter)
              <span> <a href="{{route('chapters.show', ['chapter' => $chapter->id])}}">{{$index + 1}}</a> </span>
            @endforeach
            <br>
            <a title="add a chapter" href="{{route('chapters.create', ['novel_id' => $novel->id])}}" type="submit" class="btn"><i class="fas fa-plus"></i></a>
          </p>
        </section>
      @endforeach
    @endif
  </section>

</div>
@endsection
