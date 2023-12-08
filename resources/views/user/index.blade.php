@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')

    <ul>

        @foreach ($users as $user)
            <li>ID: <a href="{{ route('user.show', ['id' => $user->id]) }}">{{ $user -> name }}</a></li>
            <li>Name: {{ $user -> name }}</li>
            <li>Email: {{ $user -> email }}</li>
            <li>Email Verified At: {{ $user -> email_verified_at ?? 'Unverified' }}</li>
            <li>Picture path: {{ $user -> picture }}</li>
            <li>Roles:</li>
            <ul>
                @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                @endforeach
            </ul>
            <br>
        @endforeach

    </ul>

    {{ $users->links() }}

@endsection