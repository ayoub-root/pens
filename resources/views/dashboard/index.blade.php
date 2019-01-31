@extends('layouts.app')

@section('content')
<div class="container">

  <section class="user-info">
    <h2 class="user-name">{{$user->name}}</h2>
    <small>membre since : {{ $user->membre_since() }}</small>
  </section>
  @if(auth()->user()->isA('administrator'))
    <ul>
      <li><a href="{{route('novels')}}">all novels</a></li>
      <li><a href="{{route('users')}}">all users</a></li>
    </ul>
  @endif
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
          @if (auth()->user()->canAndOwns('delete-novel', $novel) || auth()->user()->hasRole('admin'))
            <form method="post" action="{{route('novels.destroy', ['novel' => $novel->id])}}">
              @method('DELETE')
              @csrf
              <button title="delete novel" type="submit"><i class="far fa-trash-alt"></i></button>
            </form>
          @endif

          @if (auth()->user()->canAndOwns('update-novel', $novel) || auth()->user()->hasRole('admin'))
              <a class="box text-center" href="{{ route('novels.edit', ['novel' => $novel->id]) }}"><i title="edit novel" class="far fa-edit"></i></a>
          @endif

          <p class="novel-chapters">
            chapters :
            @foreach($novel->chapters as $index => $chapter)
              <span> <a href="{{route('chapters.show', ['chapter' => $chapter->id])}}">{{$index + 1}}</a> </span>
            @endforeach
            <span><a class="btn" title="add a chapter" href="{{route('chapters.create', ['novel_id' => $novel->id])}}" type="submit"><i class="fas fa-plus"></i></a></span>
            <br>
          </p>
        </section>
      @endforeach
    @endif
  </section>

</div>
@endsection
