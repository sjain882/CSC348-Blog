@extends('layouts.main')

@section('title', 'Viewing single user')

@section('content')

    <ul>
        <li>ID: {{ $user -> id }}</li>
        <li>Name: {{ $user -> name }}</li>
        <li>Email: {{ $user -> email }}</li>
        <li>Picture: {{ $user -> picture }}</li>
        <li>Role: {{ $user -> role_id }}</li>
    </ul>
    
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

