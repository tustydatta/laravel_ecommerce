@extends('layouts.backend')

@section('content')
<h1 class="text-center text-3xl mt-12">Products</h1>
<div class="bg-orange-400 h-1 w-20 mx-auto mt-1"></div>
<div class="border border-white text-center py-6 m-8">
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        <h1 class="mb-4 text-2xl text-orange-400">Create a new item</h1>
        @csrf
        <div class="w-full mb-4">
            <label class="text-xl">Name</label>
            <input type="text" name="name" placeholder="Enter a item name" class="w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('name')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Slug</label>
            <input type="text" name="slug" placeholder="Enter a slug" class="w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('slug')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Image</label>
            <input type="file" name="image" placeholder="Enter a item image" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('image')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>


        <div class="w-full mb-4">
            <label class="text-xl">Status</label>
            <select name="is_active" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        
        <a href="{{ route('category.index') }}" class="bg-purple-600 text-white p-3 border border-green-800 rounded-lg">Back</a>
        <input type="submit" value="Add" class="bg-green-700 text-white p-3 border border-green-800 rounded-lg">
    </form>
</div>
    
@endsection