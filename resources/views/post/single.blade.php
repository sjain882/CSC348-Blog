@extends('layouts.main')

@section('title', 'Viewing single post')

@section('content')


    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>
    

    <ul>
        <li>Title: {{ $post -> title }}</a></li>
        <li>Body: {{ $post -> body }}</a></li>
        <li>Image Path: {{ $post -> image_path ?? 'No image uploaded' }}</a></li>
        <li>Posted by user:  <a href="/user/{{ $post -> user -> id }}">{{ $post -> user -> name }}</a></li>
    </ul>

    @if ($post->image_path != null)
        <img src='{{ Storage::disk("post-images")->url($post->image_path) }}'/>
    @endif


    @if (Auth::user()->canEditPost($post->user_id))
        <form method="GET"
            action="{{ route('post.edit', ['id' => $post->id]) }}">
            @csrf
            @method('GET')
            <button type="submit">Edit post</button>
        </form>
    @endif
    
    @if (Auth::user()->canDeletePost($post->user_id))
        <form method="POST"
            action="{{ route('post.destroy', ['id' => $post->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete post</button>
        </form>
    @endif

@endsection

