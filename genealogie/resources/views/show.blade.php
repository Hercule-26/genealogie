@extends('layout')

@section('title', 'Person Details')

@section('content')
    <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
    <p><strong>Birth name:</strong> {{ $person->birth_name ?? 'Not specified' }}</p>
    <p><strong>Date of birth:</strong> {{ $person->date_of_birth ?? 'Not specified' }}</p>

    <h3>Parents</h3>
    <ul>
        @if ($person->parents->isNotEmpty())
            @foreach ($person->parents as $parent)
                <li>{{ $parent->first_name }} {{ $parent->last_name }}</li>
            @endforeach
        @else
            <li>No parents registered.</li>
        @endif
    </ul>

    <h3>Children</h3>
    <ul>
        @if ($person->children->isNotEmpty())
            @foreach ($person->children as $child)
                <li>{{ $child->first_name }} {{ $child->last_name }}</li>
            @endforeach
        @else
            <li>No children registered.</li>
        @endif
    </ul>
@endsection
