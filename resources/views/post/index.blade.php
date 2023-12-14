@extends ('layouts.main')

@section('title', 'List of all posts')

@section('content')


<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="http://127.0.0.1/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ModernBlog - Posts</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="http://127.0.0.1/posts" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Posts</a>
          </li>
          <li>
            <a href="http://127.0.0.1/users" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Users</a>
          </li>
          <li>
            <a href="http://127.0.0.1/posts/create" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Create New Post</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  


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

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Posted at:</strong> {{ $post -> created_at }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Edited at:</strong> {{ $post -> updated_at }}</p>
                <br>

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


    
    {{ $posts->links() }}

    @if (!Auth::user()->isMuted())

        <a href="{{ route('post.create') }}">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create New Post</button>
        </a>
    @endif

@endsection