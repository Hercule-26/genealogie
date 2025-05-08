@extends('layout')

@section('title', 'Create a New Person')

@section('content')
    <h1>Create a New Person</h1>

    <div class="mb-3 text-muted">
        Fields with <span class="text-danger">*</span> are required.
    </div>

    <form action="{{ route('person.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
            <input type="text" name="first_name" class="form-control" id="first_name" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
            <input type="text" name="last_name" class="form-control" id="last_name" required>
        </div>

        <div class="mb-3">
            <label for="birth_name" class="form-label">Birth Name</label>
            <input type="text" name="birth_name" class="form-control" id="birth_name">
        </div>

        <div class="mb-3">
            <label for="middle_names" class="form-label">Middle Names</label>
            <input type="text" name="middle_names" class="form-control" id="middle_names">
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
