@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            @endif

            @if (session()->has('loginerror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginerror') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            @endif

            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf
                    <img class="mb-4" src="https://source.unsplash.com/800x400?html" class=" rounded-circle" alt="html" width="442" height="227">
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
              
                    <div class="form-floating mb-3">
                        <input type="email" name="email" autofocus required class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" required class="form-control " id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
                <small class="text-center mt-2 d-block">
                    Not Registered ? <a href="/register" class="text-decoration-none text-primary">Register Now!</a>
                </small>
                <p class="mt-5 mb-3 text-muted">&copy; 2012–2022</p>
            </main>
        </div>
    </div>
</div>


@endsection