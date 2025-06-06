@extends('layouts.main')

@section('title', 'Viewing single user')

@section('content')




{{-- Start of code block attributed to flowbite --}}
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end px-4 pt-4">
            <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d=""/>
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center pb-10">
            {{-- End of code block attributed to flowbite --}}

            
          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user -> name }}</h5>

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $user -> id }}</span>
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">Email: {{ $user -> email }}</span>
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">Created at: {{ $user -> created_at }}</span>
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="text-sm text-gray-500 dark:text-gray-400">Updated at: {{ $user -> updated_at }}</span>
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}

            <br>

            @if($user->isAdmin())
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Admin</span>
            @endif
            
            @if($user->isModerator())
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Moderator</span>
            @endif
            
            @if($user->isMuted())
            {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Muted</span>
            @endif

          {{-- The entire value of the "class" property here is attributed to flowbite  --}}
            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">User</span>

            <div class="flex mt-4 md:mt-6">

                @if (Auth::user()->canMuteUser())
                    <form method="POST"
                        action="{{ route('user.update', ['id' => $user->id]) }}">
                        @csrf
                        @method('PATCH')
                        {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                        <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Toggle mute status</button>
                    </form>
                @endif

                
                @if (Auth::user()->canDeleteUser($user->id))
                    <form method="POST"
                        action="{{ route('user.destroy', ['id' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        {{-- The entire value of the "class" property here is attributed to flowbite  --}}
                        <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Delete user</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
            


    
    <br>

    <header>
        <h1>All posts:</h1>
    </header>

    @foreach ($posts as $post)

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

            </div>
        </div>

        <br>
        <br>
        
    @endforeach










    <header>
        <h1>All comments:</h1>
    </header>





    @foreach ($user->comments as $comment)

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

