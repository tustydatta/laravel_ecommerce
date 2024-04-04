@extends('layouts.app')

@section('content')
<div class="border border-white text-center py-6">
    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
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
            <label class="text-xl">Image</label>
            <input type="file" name="image" placeholder="Enter a item image" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('image')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Price</label>
            <input type="number" name="price" placeholder="Enter the item price" class="w-2/4 ml-5 p-2 text-black rounded-lg">
            @error('price')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('items.index') }}" class="bg-purple-600 text-white p-3 border border-green-800 rounded-lg">Back</a>
        <input type="submit" value="Add" class="bg-green-700 text-white p-3 border border-green-800 rounded-lg">
    </form>
</div>
    
@endsection