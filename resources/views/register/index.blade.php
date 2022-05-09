@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-signin">
                <form action="/register" method="post">
                    @csrf
                    <img class="mb-4" src="https://source.unsplash.com/800x400?html" class=" rounded-circle" alt="html" width="442" height="227">
                    <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
              
                    <div class="form-floating mb-2">
                        <input type="text" value="{{ old('name') }}" autofocus required class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name:sakka">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" value="{{ old('username') }}" required class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username:sakka">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                            @enderror
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="email">Email address</label>
                      </div>
                    <div class="form-floating mb-2">
                        <input type="password" required class="form-control @error('password') is-invalid @enderror " name="password" id="password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="Password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <small class="text-center mt-2 d-block">
                    Already Registered ? <a href="/login" class="text-decoration-none text-primary">Login</a>
                </small>
                <p class="mt-5 mb-3 text-muted">&copy; 2012–2022</p>
            </main>
        </div>
    </div>
</div>


@endsection