@extends ('layouts.main')

@section('title', 'List of all posts')

@section('content')

    <ul>

        @foreach ($posts as $post)
            <li>Title: <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post -> title }}</a></li>
            <li>Body: {{ $post -> body }}</li>
            <li>Image Path: {{ $post -> image_path ?? 'No image uploaded' }}</li>
            <li>Posted by user:  <a href="/user/{{ $post -> user -> id }}">{{ $post -> user -> name }}</li>
            <br>
        @endforeach

    </ul>
    
    {{ $posts->links() }}

    <a href="{{ route('post.create') }}">Create New Post</a>

@endsection