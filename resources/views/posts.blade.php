{{-- @dd($posts) --}}
@extends('layouts.main')
@section('container')
<div class="row mt-3 mb-2 text-center">
  <div class="col-lg">
    <h1 class="mt-3 text-success text-center">{{ $title }}</h1>
  </div>
</div>
<div class="row justify-content-center mb-1">
  <div class="col-md-6">
    <form action="/posts">
      {{-- @csrf --}}
      @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <div class="input-group mb-3 border border-success">
        <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Cari Postingan..." name="search" id="search">
        <button class="btn btn-success" type="submit" id="btn_search">Search</button>
      </div>
    </form>
  </div>
</div>

@if ( $posts->count())
<div class="card mb-3">
  <div class="position-absolute mt-2">
    <a href="/posts?category={{ $posts[0]->category->slug }}" style="background-color:rgba(0, 0, 0, 0.7)" class="px-3 py-2 text-decoration-none text-light"> {{ $posts[0]->category->name }} </a>
  </div>
  @if ($posts[0]->image)
  <div class="box-img" style="max-height: 400px; overflow:hidden;">
    <img src="{{ asset('storage/'. $posts[0]->image)}}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->slug }}">
  </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->slug }}">
  @endif
  <div class="card-body text-center">
    <h3 class="card-title">
      {{ $posts[0]->title }}
    </h3>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>
    <a href="/posts{{ $posts[0]->slug }}" class="btn btn-success text-center">Read More</a>
    <br>
    <p class="card-text float-start">
      <small class="text-muted">
        By <span class="badge bg-primary"><a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none text-white">{{ $posts[0]->author->name }}</a></span> 
        Last updated <span class="badge bg-primary">{{ $posts[0]->created_at->diffForHumans() }}</span>
      </small></p>
  </div>
</div>

{{-- <article class="mb-5 mt-3"> --}}
  <div class="row justify-content-center">
  @foreach ( $posts->skip(1) as $post )
      <div class="col-md-4 mb-3 mt-3">
        <div class="card-group">
          <div class="card">
            <div class="position-absolute text-white px-3 py-2" style="background-color:rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
            {{-- <span class="badge rounded-pill bg-success">{{ $post->category->name }}</span> --}}
            </div>
            @if ($post->image)
            <div class="box-img" style="max-height: 400px; overflow:hidden;">
              <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid card-img-top" alt="man">
            </div>
            @else
            <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}" class="img-fluid card-img-top" alt="man">
            @endif
            <div class="card-body">
              <a href="" class="text-decoration-none">
                <h5 class="card-title">{{ $post->title }}</h5>
              </a>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/posts/{{ $post->slug }}" class=" btn btn-success">Read More</a>
            </div>
            <div class="card-footer">
              <small class="text-dark">
                <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                Last updated <span class="badge bg-primary">{{ $post->created_at->diffForHumans() }}</span>
              </small>
            </div>
          </div>
        </div>
      </div>
      
  @endforeach
  
</div>

@else
<p class="fs-1 text-center">No Found From Database...</p>
@endif
{{-- </article> --}}
<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>

@endsection
