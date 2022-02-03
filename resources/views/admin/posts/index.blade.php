@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
       <h1>elenco posts</h1>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">titolo</th>
            <th scope="col">azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post )
             <tr>
                
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td><a  class="btn btn-primary" href="{{route('admin.posts.show',$post)}}"> SHOW</a></td>
                <td><a  class="btn btn-success" href="{{route('admin.posts.edit',$post)}}">EDIT</a></td>
                <td>
                  <form  action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">DELETE</button></td>
                  </form>
                </td>
                
             </tr>

            
            @endforeach  
       
        </tbody>
      </table>
    </div>
</div>
@endsection
