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

@endsection

