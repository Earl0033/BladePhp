<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'My Laravel App')</title>

    {{-- Tailwind CSS (via Vite or CDN) --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-bold text-blue-600">My App</a>

            <div class="space-x-4">
                <a href="{{ route('products.index') }}" class="hover:text-blue-600">Products</a>
                <a href="{{ route('products.create') }}" class="hover:text-blue-600">Add Product</a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>


</body>

</html>
