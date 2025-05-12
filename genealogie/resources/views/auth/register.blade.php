@extends('layout')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Register</h1>
    <form method="POST" action="{{ route('register') }}">
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" 
                   class="form-control" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   required>
        </div>

        <button type="submit" class="btn btn-success">Register</button>
    </form>

    <div class="mt-3">
        <p class="mb-0">Already have an account?</p>
        <a href="{{ route('login') }}">Click here to login</a>
    </div>
</div>
@endsection
