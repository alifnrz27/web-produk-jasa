<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Produk Jasa')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    <nav class="bg-blue-500 p-2 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold flex items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 md:h-20 mr-4">
                <span class="hidden sm:inline-block text-xl font-semibold text-shadow logo-hover transition duration-300">ORINAL PRODUCT</span>
            </a>

            <div class="hidden md:flex items-center space-x-4">
                <form action="{{ route('products.index') }}" method="GET" class="flex items-center bg-white rounded-lg overflow-hidden shadow-md w-80">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="px-4 py-2 w-full border-none focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="submit" class="bg-blue-400 text-white px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M9 4a7 7 0 107 7 7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </form>
                
            </div>

            <div class="hidden md:flex space-x-2 text-white">
                <a href="{{ route('blogs.index') }}" class="hover:bg-blue-600 px-4 py-2 rounded-md border font-bold">Blog</a>
                <a href="{{ route('products.index') }}" class="hover:bg-blue-600 px-4 py-2 rounded-md border font-bold">Produk</a>
                <a href="{{ route('about') }}" class="hover:bg-blue-600 px-4 py-2 rounded-md border font-bold">Tentang</a>
            </div>

            <div class="flex items-center md:hidden space-x-4">
                <button id="search-icon" class="text-white" onclick="toggleSearch()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M9 4a7 7 0 107 7 7 7 0 00-7-7z" />
                    </svg>
                </button>

                <button id="hamburger-icon" class="text-white" onclick="toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </nav>

    <div id="mobile-menu" class="md:hidden hidden bg-blue-500 text-white w-full space-y-4 p-4">
        <a href="{{ route('products.index') }}" class="block hover:bg-blue-600 px-4 py-2 rounded-md">Produk</a>
        <a href="{{ route('about') }}" class="block hover:bg-blue-600 px-4 py-2 rounded-md">Tentang</a>
    </div>

    <div id="mobile-search" class="md:hidden hidden w-full px-4 mt-4">
        <form action="{{ route('products.index') }}" method="GET" class="flex items-center bg-white rounded-lg overflow-hidden shadow-md">
            <input type="text" name="search" placeholder="Cari produk..." class="px-4 py-2 w-full border-none focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-400 text-white px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M9 4a7 7 0 107 7 7 7 0 00-7-7z" />
                </svg>
            </button>
        </form>
    </div>

    <div class="container mx-auto mt-8 flex-grow">
        @yield('content')
    </div>

    <footer class="bg-blue-500 text-white py-4 mt-8 text-center flex justify-center">
        <p>&copy; {{ date('Y') }} Aplikasi Produk Jasa</p>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function toggleSearch() {
            const searchInput = document.getElementById('mobile-search');
            searchInput.classList.toggle('hidden');
        }
    </script>

    @stack('scripts')
</body>

</html>

