@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="font-bold text-3xl text-indigo-600">Edit Category</h2>
    <hr class="h-1 bg-indigo-600 mb-8">
    
    <div class="mt-10">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
          
            
            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" placeholder="Category Name" name="name" value="{{ $category->name }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" placeholder="Priority" name="priority" value="{{ $category->priority }}">
                @error('priority')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex justify-center gap-5">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-10 rounded-lg transition duration-300">Update</button>
                <a href="{{ route('categories.index') }}" class="bg-red-500 hover:bg-red-600 text-white py-3 px-7 rounded-lg transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
