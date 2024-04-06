@extends('layouts.backend')

@section('content')

@if(session('success'))
    <div x-data="{ open: true }">
        <div class="w-ful bg-green-400 px-6 py-5 flex flex-row justify-between" 
        x-show="open">
            <p>{{ session('success') }}</p>
            <i class="fa fa-close text-lg" x-on:click="open =! open"></i>
        </div>
    </div>
@endif

<h1 class="text-center text-3xl mt-12">Products</h1>
<div class="bg-orange-400 h-1 w-20 mx-auto mt-1"></div>
<div class="border border-white text-center py-6 m-8">
    <form action="{{ route('items.update', $items->id) }}" method="post" enctype = "multipart/form-data">
        <h1 class="mb-4 text-2xl text-orange-400">Change the item</h1>

        @csrf
        @method('PUT')

        <div class="w-full mb-4">
            <label class="text-xl">Name</label>
            <input type="text" value="{{ $items->name }}" name="name" class="w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('name')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Category</label>
            <select name="category_id" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
                @forelse($category as $cat)
                    <option value="{{ $cat->id }}" {{ ($cat->id == $items->category_id)? 'selected' : '' }} >{{ $cat->name }}</option>
                @empty
                    <option disabled>Category Not found</option>
                @endforelse
            </select>
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Image</label>
            <input type="file" name="image" placeholder="Enter a item image" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
            @error('image')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-4">
            <img src="{{ asset('images/items/'.$items->image) }}" alt="" class="h-auto w-1/3 mx-auto">
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Price</label>
            <input type="number" value="{{ $items->price}}" name="price" class="w-2/4 ml-5 p-2 text-black rounded-lg">
            @error('price')
                    <div class="">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ route('items.index') }}" class="bg-purple-600 text-white p-3 border border-green-800 rounded-lg">Back</a>
        <input type="submit" value="Edit" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg m-2">
    </form>
</div>
    
@endsection