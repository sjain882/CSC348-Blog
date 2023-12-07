@extends('layouts.main')

@section('title', 'Edit post')

@section('content')

    <form method="POST" action="{{ route('post.update', $post->id ) }}">

        @csrf
        @method('PUT')
        <p>Title: <input type="text" name="title"

            value="{{ old('title') }}"></p>

        <p>Body: <input type="text" name="body"

            value="{{ old('body') }}"></p>
        
        <p>Image Path: <input type="text" name="image_path"

            value="{{ old('image_path') }}"></p>
    
        <input type="submit" value="Submit">

        <a href="{{ route('post.index') }}">Cancel</a>

    </form>

@endsection

