@extends('layouts.app')
@section('content')
<div class="container">

  <form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Titolo</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="inserisci qui il titolo del nuovo post">
    </div>
   
    <div class="form-group">
      <label for="exampleFormControlTextarea1">contenuto</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="inserisci qui il contenuto del nuovo post"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" >Invia</button>
    <button type="reset" class="btn btn-secondary" >Reset</button>
  </form>

</div>
  
@endsection