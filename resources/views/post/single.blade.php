@extends('layouts.main')

@section('title', 'Viewing single post')

@section('content')
    

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        @if ($post->image_path != null)
            <a href="#">
                {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <img class="rounded-t-lg padding-top:50px padding-right:30px padding-bottom:50px padding-left:80px" src='{{ Storage::disk("post-images")->url($post->image_path) }}' alt="Blog post image" />
            </a>
        @endif

        <div class="p-5">

            <a href="{{ route('post.show', ['id' => $post->id]) }}">
                {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post -> title }}</h5>
            </a>

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post -> body }}</p>
            
          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">Posted at: {{ $post -> updated_at }}</span>
            <br>
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">Edited at: {{ $post -> updated_at }}</span>
            <br>
            <br>

            @if (false)
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <p class="font-normal text-gray-700 dark:text-gray-400">Image filename: {{ $post -> image_path ?? 'No image uploaded' }}</p>
            <br>
            @endif

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <a href="/user/{{ $post -> user -> id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Posted by {{ $post -> user -> name }}
                {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    {{-- The entire value of the "path" property here is attributed to flowbite  --}}
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>

            <br>
            <br>

            @if (Auth::user()->canEditPost($post->user_id))
                <form method="GET"
                    action="{{ route('post.edit', ['id' => $post->id]) }}">
                    @csrf
                    @method('GET')
                    {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                    <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Edit post</button>
                </form>
            @endif
        
            <br>
        
            @if (Auth::user()->canDeletePost($post->user_id))
                <form method="POST"
                    action="{{ route('post.destroy', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                    <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Delete post</button>
                </form>
            @endif

        </div>
    </div>

    <br>


    <header>
        <h1>Add a comment:</h1>
    </header>

    

    @if (!Auth::user()->isMuted())

        <form method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="mb-5">
                {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <input type="text" id="body" name="body" value="{{ old('body') }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <input type="hidden" name="post_id" value="{{ $post->id }}" />

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <input type="submit" value="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

        </form>

    @endif



    <br>

    <header>
        <h1>Comments:</h1>
    </header>



    @foreach ($post->comments as $comment)

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            @if(false)
                <a href="{{ route('post.show', ['id' => $comment->id]) }}">
                    {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $comment -> id }}</h5>
                </a>
            @endif

            <div class="p-5">

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $comment -> body }}</p>

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <span class="text-sm text-gray-500 dark:text-gray-400">Posted at: {{ $comment -> created_at }}</span>
                <br>

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <a href="/user/{{ $comment -> user -> id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Posted by {{ $comment -> user -> name }}
                    {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        {{-- The entire value of the "path" property here is attributed to flowbite  --}}
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>

            </div>
        </div>

        <br>
        <br>
        
    @endforeach


@endsection

