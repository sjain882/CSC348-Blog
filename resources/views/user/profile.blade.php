@extends('layouts.main')

@section('title', 'Viewing single user')

@section('content')

    <ul>
        <li>ID: {{ $user -> id }}</li>
        <li>Name: {{ $user -> name }}</li>
        <li>Email: {{ $user -> email }}</li>
        <li>Picture: {{ $user -> picture }}</li>
        <li>Roles:</li>
            <ul>
                @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                @endforeach
            </ul>
    </ul>

    <form method="POST"
        action="{{ route('user.toggleMute', ['id' => $user->id]) }}">
        @csrf
        @method('PUT')
        <button type="submit">Toggle mute status</button>
    </form>

    <form method="POST"
        action="{{ route('user.destroy', ['id' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete user</button>
    </form>
    
    <br>

    <header>
        <h1>All posts:</h1>
    </header>

    @foreach ($posts as $post)
        <ul>
            <li>Title: <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post -> title }}</a></li>
            <li>Body: {{ $post -> body }}</a></li>
            <li>Image Path: {{ $post -> image_path ?? 'No image uploaded' }}</a></li>
        </ul>
    @endforeach

@endsection

