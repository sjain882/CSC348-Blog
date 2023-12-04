@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')

    <ul>

        @foreach ($users as $user)
            <li><a href "/profile/{{ $user -> name }}">{{ $user -> name }}</a></li>
        @endforeach

    </ul>
@endsection