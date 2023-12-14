@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')





<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="http://127.0.0.1/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ModernBlog - Users</span>
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
            <a href="http://127.0.0.1/posts" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Posts</a>
          </li>
          <li>
            <a href="http://127.0.0.1/users" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page"">Users</a>
          </li>
          <li>
            <a href="http://127.0.0.1/posts/create" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Create New Post</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>





  

    <ul>

        @foreach ($users as $user)
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
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user -> name }}</h5>
    
                <span class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $user -> id }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Email: {{ $user -> email }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Created at: {{ $user -> created_at }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Updated at: {{ $user -> updated_at }}</span>

                <br>
    
                @if($user->isAdmin())
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Admin</span>
                @endif
                
                @if($user->isModerator())
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Moderator</span>
                @endif
                
                @if($user->isMuted())
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Muted</span>
                @endif
    
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">User</span>
    
                <div class="flex mt-4 md:mt-6">
    
                    @if (Auth::user()->canMuteUser())
                        <form method="POST"
                            action="{{ route('user.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Toggle mute status</button>
                        </form>
                    @endif
    
                    
                    @if (Auth::user()->canDeleteUser($user->id))
                        <form method="POST"
                            action="{{ route('user.destroy', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Delete user</button>
                        </form>
                    @endif
    
                </div>
            </div>
        </div>
        <br>
        @endforeach

    </ul>

    {{ $users->links() }}

@endsection