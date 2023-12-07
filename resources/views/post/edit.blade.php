@extends('layouts.main')

@section('title', 'Edit post')

@section('content')

    <form method="PUT" action="{{ route('post.update') }}">

        @csrf
        <p>Title: <input type="text" name="title"

            value="{{ old('title') }}"></p>

        <p>Body: <input type="text" name="body"

            value="{{ old('body') }}"></p>
        
        <p>Image Path: <input type="text" name="image_path"

            value="{{ old('image_path') }}"></p>
    
        <input type="submit" value="Submit">

        <form method="GET"
            action="{{ route('post.index') }}">
            @csrf
            @method('GET')
            <button type="button">Cancel</button>
        </form>

    </form>

@endsection

