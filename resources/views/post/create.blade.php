@extends('layouts.main')

@section('title', 'Create New Post')

@section('content')

    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">

        @csrf
        <p>Title: <input type="text" name="title"

            value="{{ old('title') }}"></p>

        <p>Body: <input type="text" name="body"

            value="{{ old('body') }}"></p>

        <p>Image: <input type="file" name="image"

            value="{{ old('image') }}"></p>
    
        <input type="submit" value="Submit">

        <a href="{{ route('post.index') }}">Cancel</a>

    </form>

@endsection

