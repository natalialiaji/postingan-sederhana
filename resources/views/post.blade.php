{{-- @dd($post) --}}
@extends('layouts/main')
@section('container')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-footer">
                  <small class="text-white">
                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                     Last updated <span class="badge bg-primary">{{ $post->created_at->diffForHumans() }}</span>
                  </small>
                </div>
                <div class="position-absolute mt-5">
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $post->category->name }}</a>
                </div>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid" alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{!! $post->body !!}</p>
                    <a href="/posts" class="btn btn-danger">Back To Post</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    {{-- Post::create([
    'title' => 'Judul Yang Kelima',
    'category_id' => 2,
    'slug' =>'judul-yang-kelima',
    'excerpt' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos.',
    'body' =>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo iste, accusantium doloremque magni sed facilis molestias harum pariatur soluta, vitae voluptatem dolorem natus aut eius quaerat deleniti assumenda repellendus itaque veniam officiis recusandae quis architecto. Quibusdam asperiores aut adipisci necessitatibus odit voluptatibus exercitationem, cupiditate sit consequuntur, repellendus debitis velit eius voluptate alias quos? Accusamus dicta beatae nemo eius error, animi tempore distinctio ea corrupti sed quasi perferendis iure nostrum alias quidem explicabo pariatur quos deleniti voluptates cupiditate earum quibusdam sunt, praesentium inventore. Repellat sunt amet velit, asperiores quibusdam iure ratione doloremque labore esse veritatis. Sit odit laudantium suscipit! Ad, possimus.'
]) --}}

{{-- Category::create([
    'name' => 'Front-End',
    'slug' => 'fron-end'
]) --}}
