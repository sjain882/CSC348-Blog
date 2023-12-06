@extends('layouts.main')

@section('title', 'Create New Post')

@section('content')

    <form method="POST" action="{{ route('post.store') }}">

        @csrf
        <p>Title: <input type="text" name="name"></p>
        <p>Body: <input type="text" name="name"></p>
        <p>Image Path: <input type="text" name="name"></p>
        <input type="submit" value="Submit">

        <a href="{{ route('post.index') }}">Cancel</a>

    </form>

@endsection

