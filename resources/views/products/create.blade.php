@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="font-bold text-3xl text-indigo-600">Create Product</h2>
    <hr class="h-1 bg-indigo-600 mb-8">

    <div class="mt-10">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <select name="category_id" id="" class="w-full p-3 border border-gray-300 rounded-lg">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <textarea name="description" cols="30" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Stock" name="stock" value="{{ old('stock') }}">
                @error('stock')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="file" class="w-full p-3 border border-gray-300 rounded-lg" name="photopath">
                @error('photopath')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5 flex gap-5 justify-center">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white p-3 rounded-lg transition duration-300">Create Product</button>
                <a href="{{ route('products.index') }}" class="bg-red-500 hover:bg-red-600 text-white p-3 rounded-lg transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
