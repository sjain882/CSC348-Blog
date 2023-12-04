@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')

    <ul>

        @foreach ($users as $user)
            <li>{{ $user ->name }}</li>
        @endforeach

    </ul>
@endsection