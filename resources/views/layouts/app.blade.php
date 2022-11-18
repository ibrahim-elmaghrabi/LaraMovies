<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraMovies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/logo2.webp') }}">
    @livewireStyles
</head>
<body class="bg-gray-900 text-white h-screen antialiased leading-none font-sans">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row justify-between item-center px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}" class="text-lg uppercase font-semibold text-red-500 no-underline ">
                         <i class="fa-sharp fa-solid fa-video"></i>
                          LaraMovies
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="no-underline hover:underline">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="no-underline hover:underline">Tv Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="no-underline hover:underline">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row  items-center">
                 <livewire:search></livewire:search>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <i class="fa-solid fa-user-tie"></i>
                    </a>
                </div>
            </div>
        </div>

    </nav>

    @yield('content')

    <footer class="bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gray-700 text-white h-20 mt-20 opacity-90 md:justify-center" >
        <p class="text-center">Copyright &copy; 2022, All Rights reserved</p>
    </footer>

            <script src="https://cdn.tailwindcss.com"></script>
            <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>

              @livewireScripts
    </body>
</html>
