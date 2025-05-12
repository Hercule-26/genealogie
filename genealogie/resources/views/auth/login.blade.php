@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" 
                   class="form-control @error('username') is-invalid @enderror" 
                   id="username" 
                   name="username" 
                   value="{{ old('username') }}" 
                   required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   id="password" 
                   name="password" 
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="mt-3">
        <p class="mb-0">Don't have an account?</p>
        <a href="{{ route('register') }}">Click here to create one</a>
    </div>
</div>
@endsection
