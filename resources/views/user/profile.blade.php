@extends('layouts.main')

@section('title', '{{ $user->name }}')

@section('content')

    <ul>
        <li>Name: {{ $user -> name }}</li>
        <li>Email: {{ $user -> email }}</li>
        <li>Picture: {{ $user -> picture }}</li>
        <li>Role: {{ $user -> role_id }}</li>
    </ul>

@endsection

