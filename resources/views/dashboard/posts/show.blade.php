@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">By:{{ Auth()->user()->name }}</h1>
</div>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @if (session()->has('sukses'))
              <div class="col-md-5">
                <div class="alert alert-success alert-dismissible fade show ms-3" role="alert">
                  <strong>Berhasil!</strong> {{ session('sukses') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            @endif
            <div class="card mb-3">
                <div class="position-absolute mt-5">
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $post->category->name }}</a>
                </div>
                @if ($post->image)
                <div class="img-box" style="max-height:400px;overflow:hidden;">
                  <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid" alt="{{ $post->category->name }}">
                </div>
                  @else 
                  <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid" alt="{{ $post->category->name }}"> 
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{!! $post->body !!}</p>                    
                    <div class="d-block mt-3 mb-3">
                        <a href="" class="btn btn-success text-decoration-none"><span data-feather="save"></span> Save</a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Update</a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="border-0 d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('Yakin LO ?')"><span data-feather="trash-2"></span> Delete</button>
                        </form>
                    </div>
                    <a href="/dashboard/posts" class="btn btn-outline-secondary mb-5"><span data-feather="arrow-left"></span> Back To Post</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection