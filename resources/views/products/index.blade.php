@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="font-bold text-3xl text-indigo-600">Products</h2>
        <hr class="h-1 bg-indigo-600">

        <div class="mt-10 text-right">
            <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700 transition duration-300">Add Product</a>
        </div>

        <div class="mt-10">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-3">Picture</th>
                        <th class="border p-3">Product Name</th>
                        <th class="border p-3">Product Description</th>
                        <th class="border p-3">Price</th>
                        <th class="border p-3">Stock</th>
                        <th class="border p-3">Category</th>
                        <th class="border p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="text-center">
                        <td class="border p-3">
                            <img src="{{ asset('images/products/'.$product->photopath) }}" class="w-24" alt="">
                        </td>
                        <td class="border p-3">{{ $product->name }}</td>
                        <td class="border p-3">{{ $product->description }}</td>
                        <td class="border p-3">{{ $product->price }}</td>
                        <td class="border p-3">{{ $product->stock }}</td>
                        <td class="border p-3">{{ optional($product->category)->name }}</td> <!-- Use optional helper -->
                        <td class="border p-3">
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">Edit</a>
                            <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
