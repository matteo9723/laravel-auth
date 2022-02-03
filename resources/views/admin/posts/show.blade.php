@extends('layouts.app')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">titolo</th>
      <th scope="col">contenuto</th>
      <th scope="col">slug</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->content}}</td>
      <td>{{$post->slug}}</td>
    </tr>
 
  </tbody>
</table>

<a href="{{route('admin.posts.index')}}" class="link-primary">torna indietro</a>


  
@endsection