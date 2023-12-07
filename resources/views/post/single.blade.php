@extends('layouts.main')

@section('title', 'Viewing single post')

@section('content')

    <ul>
        <li>Title: {{ $post -> title }}</a></li>
        <li>Body: {{ $post -> body }}</a></li>
        <li>Image Path: {{ $post -> image_path ?? 'No image uploaded' }}</a></li>
        <li>Posted by user:  <a href="/user/{{ $post -> user -> id }}">{{ $post -> user -> name }}</a></li>
    </ul>

    <a href="{{ route('post.destroy', ['id' => $post -> id]) }}">Delete Post</a>

@endsection

