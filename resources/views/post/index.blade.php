@extends ('layouts.main')

@section('title', 'List of all posts')

@section('content')

    <ul>

        @foreach ($posts as $post)
            <li>Title: {{ $post -> title }}</a></li>
            <li>Body: {{ $post -> body }}</a></li>
            <li>Image Path: {{ $post -> image_path ?? 'No image uploaded' }}</a></li>
            <li>Posted by user:  <a href="/user/{{ $post -> user -> id }}">{{ $post -> user -> name }}</a></li>
        @endforeach

    </ul>
@endsection