@extends('layouts.app')
@section('content')
  
<form action="{{ route('admin.posts.update', $post) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" value="{{ old('title', $post->title) }}" 
      class="form-control @error('title') is-invalid @enderror" 
      name="title" id="title" placeholder="Nome fumetto">
      @error('title')
      <p class="form_errors">
          {{ $message }}
      </p>
      @enderror
  </div>
  <div class="mb-3">
      <label for="content" class="form-label">Contenuto</label>
      {{-- <input type="text" value="{{ old('type', $post->content) }}" 
      class="form-control @error('type') is-invalid @enderror" 
      name="content" id="content" placeholder="contenuto"> --}}
      <textarea name="content" value="{{ old('type', $post->content) }}" class="form-control  @error('type') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" ></textarea>
      @error('type')
      <p class="form_errors">
          {{ $message }}
      </p>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary" >Invia</button>
  <button type="reset" class="btn btn-secondary" >Reset</button>
</form>  
@endsection