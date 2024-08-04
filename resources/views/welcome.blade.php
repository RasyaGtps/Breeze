<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('4f112d015268679f8c4fded850669870.ico') }}" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js','resources/css/dashboard.css', 'resources/js/dashboard.js'])
    </head>
    <body class="bg-zinc-800 text-white fade-in">
    <nav class="bg-zinc-800 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                </div>
                <!-- Menu Items -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex menu-container">
                    <div class="menu-background"></div>
                        <a href="{{ url('/menu1') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 1</a>
                        <a href="{{ url('/menu2') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 2</a>
                        <a href="{{ url('/menu3') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 3</a>
                        <a href="{{ url('/menu4') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 4</a>
                        <a href="{{ url('/menu5') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 5</a>
                    </div>
              </div>
              <div class="flex items-center space-x-4 menu-container">
                    <div class="menu-background"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                        <a href="{{ route('login') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>
                    @endauth
                </div>
        </div>
    </div>
</nav>
<div class="centered-dashboard">
        <div class="dashboard-container">
            <x-dashboard-layout>
                <div class="py-5">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    </div>
                </div>
            </x-dashboard-layout>
        </div>
    </div>

</body>
</html>
