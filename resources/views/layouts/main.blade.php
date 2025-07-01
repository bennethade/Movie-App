<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>

    @vite('resources/css/app.css')


</head>
<body class="font-sans bg-gray-900 text-white">
    
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="">
                        <img src="{{ asset('images/logo.png') }}" class="w-30" viewBox="0 0 96 24" fill="none" alt="">
                    </a>
                </li>

                <li class="ml-16">
                    <a href="" class="hover:text-gray-300">Movies</a>
                </li>

                <li class="ml-6">
                    <a href="" class="hover:text-gray-300">TV Shows</a>
                </li>

                <li class="ml-6">
                    <a href="" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">

                    <div class="absolute top-0">
                        <img src="{{ asset('images/search-symbol.png') }}" class="fill-current w-4 text-gray-500 mt-2 ml-2">
                    </div>
                    
                </div>                

                <div class="ml-4">
                    <a href="">
                        <img src="{{ asset('images/user-avater.png') }}" alt="" class="rounded-full w-8 h-8">
                    </a>
                </div>
                
            </div>

            

        </div>
    </nav>

    @yield('content')


</body>
</html>