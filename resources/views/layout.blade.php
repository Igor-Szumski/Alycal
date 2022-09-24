<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Alycal</title>
</head>
<body class="bg-indigo-900">
    <nav class="p-6 flex justify-between border-b-2 border-black">
        <ul class="flex items-center flex-grow justify-center">
            <li class="p-3 bg-gray-200 flex items-center rounded-full shadow-xl w-full max-w-5xl">
                <form method="GET" action="{{route('search')}}" class="w-full">
                    <input class="w-full rounded-l-full py-4 px-6 text-gray-600 leading-tight focus:outline-none bg-gray-200" name ="search" id="search" type="text" placeholder="Search">
                </form>
            </li>
        </ul>
        <ul class="p-6 flex justify-center flex-none mr-20 align-center">
            @auth
                <div class="bg-gray-200 rounded-2xl">
                    <div class="py-4 px-8 rounded-2xl dropdown inline-block relative">
                        <button class="bg-gray-200 font-semibold py-2 px-10 rounded inline-flex items-center">
                            <span class="mr-2">{{ auth()->user()->username }}</span>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 mt-4 pt-1">
                            <!--<li class=""><a class="rounded-t bg-gray-100 hover:bg-gray-400 py-2 px-10 block whitespace-no-wrap" href="#">Favorites</a></li>-->
                            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-10 block whitespace-no-wrap" href="{{ route('addSong') }}">Add new song</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="rounded-b bg-gray-100 hover:bg-gray-400 py-2 px-10 block whitespace-no-wrap w-full">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
            @guest
                <li class="p-3"><a href="{{ route('login') }}" class="bg-gray-200 font-semibold py-2 px-10 rounded-xl inline-flex items-center">Log in</a></li>
                <li class="p-3"><a href="{{ route('register') }}" class="bg-gray-200 font-semibold py-2 px-10 rounded-xl inline-flex items-center">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield("content")
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            }
    </style>
</body>
</html>
