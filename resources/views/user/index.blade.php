@extends ('layouts.main')

@section('title', 'List of all users')

@section('content')

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