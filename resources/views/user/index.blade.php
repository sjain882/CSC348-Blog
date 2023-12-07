@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')

    <ul>

        @foreach ($users as $user)
            <li>Name: <a href="{{ route('user.show', ['id' => $user->id]) }}">{{ $user -> name }}</a></li>
        @endforeach

    </ul>
@endsection