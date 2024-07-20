@extends('layouts.app')

@section('content')
    <h2 class="font-bold text-3xl text-teal-600">Dashboard</h2>
    <hr class="h-1 bg-teal-600">

    <div class="grid grid-cols-3 gap-4 mt-10">
        <div class="bg-teal-500 p-4 shadow-md rounded-lg hover:bg-teal-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-users mr-2"></i> Total Users
            </h3>
            <p class="text-4xl text-white font-bold">100</p>
        </div>
        <div class="bg-indigo-500 p-4 shadow-md rounded-lg hover:bg-indigo-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-box mr-2"></i> Total Products
            </h3>
            <p class="text-4xl text-white font-bold">{{$products}}</p>
        </div>
        <div class="bg-pink-500 p-4 shadow-md rounded-lg hover:bg-pink-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i> Total Orders
            </h3>
            <p class="text-4xl text-white font-bold">300</p>
        </div>
        <div class="bg-purple-500 p-4 shadow-md rounded-lg hover:bg-purple-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-tags mr-2"></i> Total Categories
            </h3>
            <p class="text-4xl text-white font-bold">{{$categories}}</p>
        </div>
        <div class="bg-orange-500 p-4 shadow-md rounded-lg hover:bg-orange-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-clock mr-2"></i> Pending Orders
            </h3>
            <p class="text-4xl text-white font-bold">30</p>
        </div>
        <div class="bg-yellow-500 p-4 shadow-md rounded-lg hover:bg-yellow-600 transition duration-300">
            <h3 class="font-bold text-2xl text-white flex items-center">
                <i class="fas fa-eye mr-2"></i> Total Visits
            </h3>
            <p class="text-4xl text-white font-bold">30000</p>
        </div>
    </div>
@endsection
