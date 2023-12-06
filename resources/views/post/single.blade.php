@extends('layouts.main')

@section('title', '{{ $post -> title }}')

@section('content')

    <ul>
        <li>Title: {{ $post -> title }}</a></li>
        <li>Body: {{ $post -> body }}</a></li>
        <li>Image Path: {{ $post -> image_path }}</a></li>
        <li>Posted by user: {{ $post -> user_id }}</a></li>
    </ul>

@endsection

