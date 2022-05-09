{{-- @dd($posts) --}}
@extends('layouts.main')
@section('container')
<h1 class="mt-3">Post Category : {{ $category }}</h1>
<span class="badge rounded-pill bg-success mb-3"></span>
{{-- <article class="mb-5 mt-3"> --}}
  <div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ( $posts as $post )
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset("img/woman-removebg-preview.png") }}" class="img-fluid w-50 card-img-top" alt="man">
          <div class="card-body">
            <h3><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }} </a></h3>
            <span class="badge rounded-pill bg-success mb-3"><a href="/authors/{{ $post->author->username }}" class="text-white text-decoration-none">{{ $post->author->name }}</a></span>
            <p class="card-text">{{ $post->exceprt }}</p>
            <a href="/posts" class="btn btn-danger">Back To Post</a>
          </div>
          <div class="card-footer">
            <small class="text-muted"> Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
  @endforeach
</div>
{{-- </article> --}}
@endsection
