<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="font-bold text-3xl text-indigo-600">Orders</h2>
        <hr class="h-1 bg-indigo-600 mb-8">

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-green-600 text-white">Order ID</th>
                    <th class="py-2 px-4 bg-green-600 text-white">User</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Product</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Quantity</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Price</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Status</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Order Date</th>
                    <th class="py-2 px-4 bg-green-600 text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $order->id }}</td>
                        <td class="py-2 px-4">{{ $order->user->name }}</td>
                        <td class="py-2 px-4 flex items-center">
                            <img src="{{ asset('images/products/' . $order->product->photopath) }}" class="w-16 h-16 object-cover mr-2" alt="{{ $order->product->name }}">
                            {{ $order->product->name }}
                        </td>
                        <td class="py-2 px-4">{{ $order->quantity }}</td>
                        <td class="py-2 px-4">{{ $order->price }}</td>
                        <td class="py-2 px-4">{{ $order->status }}</td>
                        <td class="py-2 px-4">{{ $order->order_date }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="bg-red-500 text-white p-2 rounded-lg">Pending</a>
                            <a href="{{ route('orders.status', [$order->id, 'Processing']) }}" class="bg-yellow-500 text-white p-2 rounded-lg">Processing</a>
                            <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}" class="bg-green-500 text-white p-2 rounded-lg">Delivered</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
