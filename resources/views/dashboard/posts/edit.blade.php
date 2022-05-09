@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Post By:{{ Auth()->user()->name }}</h1>
    </div>

    <div class="container">
        <a href="/dashboard/posts/" type="submit" class="btn btn-outline-secondary ms-0"><span data-feather="arrow-left"></span> Back</a>
            @if (session()->has('sukses'))
            <div class="col-md-5">
                <div class="alert alert-success alert-dismissible fade show ms-3" role="alert">
                    <strong>Berhasil!</strong> {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label @error('title')  is-invalid @enderror">Title</label>
                      <input type="text" value="{{ old('title', $post->title) }}" autofocus required name="title" class="form-control" id="title">
                      @error('title')
                      <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                      <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" required class="form-control" id="slug">
                     @error('slug')
                     <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                     @enderror 
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label @error('category') is-invalid @enderror">Category</label>
                        <select class="form-select w-50 text-center" required name="category_id" aria-label="Default select example">
                            <option selected value="">--PILIH--</option>
                            @foreach ($categories as $category)
                            @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        @if ($post->image)
                        <img name="image" src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->slug
                         }}" class="img-fluid img-preview mb-3 col-sm-7 d-block">
                        @else
                        <img name="image" alt="{{ $post->slug }}" class="img-fluid d-block img-preview mb-3 col-sm-7">    
                        @endif
                        <input class="form-control @error('image') is-invalid @enderror" required onchange="previewImage()" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                      <label for="body" class="form-label @error('body') is-invalid @enderror">Body</label>
                      @error('body')
                      <p>{{ $message }}</p>
                      @enderror
                      <input id="body" value="{{ old('body', $post->body) }}" type="hidden" required name="body">
                      <trix-editor input="body"></trix-editor>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                        <button type="submit" class="btn btn-outline-warning mb-3 text-black"><span data-feather="refresh-ccw"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data=> slug.value= data.slug)
        });

        document.addEventListener('trix-file-accept', function(e)
        {
            e.preventDefault();
        });

        function previewImage()
        {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display= 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent)
            {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
