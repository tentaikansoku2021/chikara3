<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-pink-100">



        <header class="bg-white shadow">
            <div class="max-w-7xl  mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="h-6 flex justify-between">
                    <div>
                        <x-a><a href="{{route('book.index')}}">TOP</a></x-a>
                        <x-a><a href="{{route('book.create')}}">REGISTER</a></x-a>
                        <x-a><a href="">NEXT</a></x-a>
                    </div>
                    <div class="inline-block">
                        <form action="{{route('book.index')}}" method="GET">
                            @csrf
                            <input type="search" name="search" class="p-1 h-10 border-2 border-blue-600 rounded-md" placeholder="Title検索">
                            <button type="submit" class="bg-blue-600  text-white p-2 rounded-md">検索</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('js/img.js')}}"></script>
</body>

</html>