<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-white text-gray-900 transition duration-300">
    <header class="py-10 bg-gradient-to-r from-blue-500 to-purple-500">
        <div class="flex items-center justify-between px-4 lg:px-10">
            <div class="text-2xl font-bold transform transition duration-500 hover:scale-110">Logo</div>
            <button class="lg:hidden rounded-md p-2 text-white hover:bg-purple-600 transition duration-200"
                id="menu-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <nav class="hidden lg:flex flex-1 justify-end space-x-4" id="nav-menu">
                <a class="{{ request()->routeIs('home') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="/">Home</a>
                <a class="{{ request()->routeIs('abouts') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.abouts') }}">About</a>
                <a class="{{ request()->routeIs('blogs') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.blogs') }}">Blog</a>
                <a class="{{ request()->routeIs('contacts') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.contact') }}">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a class="{{ request()->routeIs('dashboard') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                            href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="{{ request()->routeIs('login') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                            href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a class="{{ request()->routeIs('register') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                                href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
        <div class="hidden lg:hidden" id="mobile-menu">
            <nav class="flex flex-col items-start px-4 py-2 space-y-2">
                <a class="{{ request()->routeIs('home') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="/">Home</a>
                <a class="{{ request()->routeIs('abouts') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.abouts') }}">About</a>
                <a class="{{ request()->routeIs('blogs') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.blogs') }}">Blog</a>
                <a class="{{ request()->routeIs('contacts') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                    href="{{ route('frontend.contact') }}">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a class="{{ request()->routeIs('dashboard') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                            href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="{{ request()->routeIs('login') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                            href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a class="{{ request()->routeIs('register') ? 'bg-purple-600' : '' }} rounded-md px-3 py-2 text-white transition duration-300 hover:bg-purple-600"
                                href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
