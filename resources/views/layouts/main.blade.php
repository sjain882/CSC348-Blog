<!doctype html>

<html lang="en">
  



    <head>
        <title>ModernBlog - @yield('title')</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />



          





    </head>


    <body>
        





        {{-- <h1>ModernBlog - @yield('title')</h1> --}}

        @if (session('message'))

            <p><b>{{ session('message') }}</b></p>
            
        @endif

        @if ($errors -> any())

            <div>
                Errors:

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>

            </div>

        @endif

        <div>
            @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    </body>
    
</html>
