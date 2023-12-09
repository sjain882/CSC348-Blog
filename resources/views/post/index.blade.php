@extends ('layouts.main')

@section('title', 'List of all posts')

@section('content')






    <ul>

        @foreach ($posts as $post)

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                @if ($post->image_path != null)
                    <a href="#">
                        <img class="rounded-t-lg" src='{{ Storage::disk("post-images")->url($post->image_path) }}' alt="Blog post image" />
                    </a>
                @endif

                <div class="p-5">

                    <a href="{{ route('post.show', ['id' => $post->id]) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post -> title }}</h5>
                    </a>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post -> body }}</p>

                    @if (false)
                    <p class="font-normal text-gray-700 dark:text-gray-400">Image filename: {{ $post -> image_path ?? 'No image uploaded' }}</p>
                    <br>
                    @endif

                    <a href="/user/{{ $post -> user -> id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Posted by {{ $post -> user -> name }}
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>

                </div>
            </div>

            <br>
            <br>
            
        @endforeach

    </ul>
    
    {{ $posts->links() }}

    <a href="{{ route('post.create') }}">Create New Post</a>

@endsection