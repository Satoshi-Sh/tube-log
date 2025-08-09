<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tube Log</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />
    @vite('resources/css/app.css')
{{--    <a href="https://www.flaticon.com/free-icons/cinema" title="cinema icons">Cinema icons created by Freepik - Flaticon</a> --}}
</head>
<body class="bg-black text-white mb-40">
<div>
    <nav class=" sticky bg-gray-950 top-0  flex justify-between items-center px-4 py-6 border-b border-white/10">
        <div class="sm:block hidden">
            <a href="/" class=" italic font-extrabold text-2xl">
{{--                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">--}}
                Tube Log
            </a>
        </div>

        <div class="space-x-6 font-bold absolute left-1/2 -translate-x-1/2 mt-2 sm:mt-0">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
        </div>

        @auth
            <div class="space-x-6 font-bold sm:flex hidden">
                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer hover:text-gray-300 transition-colors duration-300">Log Out</button>
                </form>
            </div>
        @endauth

        @guest
            <div class="space-x-6 font-bold sm:block hidden">
                <x-nav-link href="/register" :active="request()->is('register')">Sign Up</x-nav-link>
                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
            </div>
        @endguest
    </nav>

    <main class="px-2 sm:px-10 mt-10 max-w-[986px] mx-auto space-y-16">
        {{ $slot }}
    </main>
</div>
</body>
</html>
