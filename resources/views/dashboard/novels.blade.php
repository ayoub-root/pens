@extends('layouts.app')

@section('content')
<div class="container">
  <h1>All Novels</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">title</th>
        <th scope="col">author</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($novels as $novel)
        <tr>
          <th scope="row">{{$novel->id}}</th>
          <td>{{$novel->title}}</td>
          <td>{{$novel->user->name}}</td>
          <td>
            <a title="delete novel" href="{{route('novels.destroy', ['novel' => $novel->id])}}">delete</a>
            |
            <a title="edit novel" href="{{route('novels.edit', ['novel' => $novel->id])}}">edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
