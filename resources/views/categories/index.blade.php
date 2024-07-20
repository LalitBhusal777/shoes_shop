@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="font-bold text-3xl text-indigo-600">Categories</h2>
    <hr class="h-1 bg-indigo-600 mb-8">
    
    <div class="mb-8 text-right">
        <a href="{{ route('categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition duration-300">Add Category</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                <tr>
                    <th class="border p-3 text-left">Name</th>
                    <th class="border p-3 text-left">Priority</th>
                    <th class="border p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-100 transition duration-300">
                        <td class="border p-3">{{ $category->name }}</td>
                        <td class="border p-3">{{ $category->priority }}</td>
                        <td class="border p-3">
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-lg transition duration-300">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition duration-300" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection
