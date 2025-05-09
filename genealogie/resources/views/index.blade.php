@extends('layout')

@section('title', 'Home')

@section('content')
    <h1>List of persons (with her creator)</h1>

    <ul class="list-group">
        @if ($peoples->isNotEmpty())
            @foreach ($peoples as $person)
                <li class="list-group-item">
                    <a href="{{ route('person.show', $person->id) }}">
                        {{ $person->first_name }} {{ $person->last_name }}
                    </a>
                    <br>
                    <span class="text-muted">
                        Create by : {{ $person->creator->name ?? 'User unknown' }}
                    </span>
                </li>
            @endforeach
        @else
            <li class="list-group-item">The is no person registered on database.</li>    
        @endif
    </ul>
@endsection
