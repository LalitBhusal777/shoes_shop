@extends('layouts.master')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gray-800 text-white">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-banner.jpg') }}" alt="Hero Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <div class="relative container mx-auto px-6 py-16 text-center">
        <h1 class="text-5xl font-bold mb-4">Welcome to Our Shoe Shop</h1>
        <p class="text-lg mb-8">Discover the latest trends and exclusive deals on our wide range of footwear.</p>
        <a href="{{ route('product') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg">Shop Now</a>
    </div>
</section>

<!-- Featured Products Section -->
<section class="my-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestProducts as $product)
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <a href="{{ route('viewproduct', $product->id) }}">
                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                            <p class="text-gray-600 mt-2">Rs. {{ $product->price }}</p>
                            <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-lg">View Details</button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Browse by Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Example category item -->
            <a href="{{ route('categoryproducts', 1) }}" class="p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/categories/category1.jpg') }}" alt="Category Name" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold">Category Name</h3>
            </a>
            <!-- Repeat for other categories -->
        </div>
    </div>
</section>

<!-- Promotions Section -->
<section class="py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Special Offers</h2>
        <p class="text-lg mb-6">Check out our latest promotions and discounts.</p>
        <a href="{{ route('product') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg">Explore Offers</a>
    </div>
</section>

@endsection
