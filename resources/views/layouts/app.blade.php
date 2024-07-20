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
<body class="font-sans antialiased bg-gray-100">
@if(Session::has('success')) 
    <div class="fixed top-4 right-4 rounded-lg shadow-md bg-blue-600 text-white px-5 py-3" id="message">
        <p>{{ session('success') }}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('message').style.display = 'none';
        }, 2000);
    </script>
@endif

<div class="flex min-h-screen">
    <div class="w-64 bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-lg">
        <div class="p-6 flex items-center justify-center">
            <img src="https://media.istockphoto.com/id/1425095709/vector/creative-word-sign-illustration-logo-r-to-run-shoe-icon-logo-template.jpg?s=612x612&w=0&k=20&c=szN7vzvkAI9kt6agUv1pcoQf4bQagNI-xr0EhsIBbuA="
            alt="Logo" class="w-20 h-20 rounded-full shadow-lg">
        </div>
        <div class="mt-10">
            <a href="{{ route('dashboard') }}" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">Dashboard</a>
            <a href="{{ route('categories.index') }}" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">Categories</a>
            <a href="{{ route('products.index') }}" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">Products</a>
            <a href="{{ route('orders.index') }}" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">Orders</a>
            <a href="#" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">Users</a>
            <form action="{{ route('logout') }}" method="post" class="text-lg block pl-4 p-3 m-2 rounded hover:bg-indigo-700 transition duration-200">
                @csrf
                <button type="submit" class="w-full text-left">Logout</button>
            </form>
        </div>
    </div>
    <div class="p-6 flex-1 bg-white shadow-inner">
        @yield('content')
    </div>
</div>
</body>
</html>
