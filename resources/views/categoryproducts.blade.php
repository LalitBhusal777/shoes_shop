@extends('layouts.master')

@section('content')
<div class="my-20">
    <h1 class="text-4xl text-center">{{ $category->name }}</h1>
    <div class="grid grid-cols-3 gap-10 my-10 px-24">
        @foreach($products as $product)
        <a href="{{route('viewproduct',$product->id)}}">
        <div class="p-2 rounded-lg shadow">
            <img src="{{ asset('images/products/'.$product->photopath) }}" alt="product image" class="w-full h-64 object-cover rounded-t-lg">
            <div class="p-2">
                <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-bold">RS {{ $product->price }}</span> <!-- Assuming price is dynamic -->
                    <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>
        </div>
        </a>
        @endforeach
    </div>
    <div class="px-24">
        {{ $products->links() }}
    </div>
</div>
@endsection
