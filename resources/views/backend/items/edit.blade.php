@extends('layouts.backend')

@section('content')
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
            
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Image</label>
            <input type="file" name="image" placeholder="Enter a item image" class="bg-gray-50  w-2/4 ml-4 p-2 text-black rounded-lg">
        </div>

        <div class="my-4">
            <img src="{{ asset('images/items/'.$items->image) }}" alt="" class="h-auto w-1/3 mx-auto">
        </div>

        <div class="w-full mb-4">
            <label class="text-xl">Price</label>
            <input type="number" value="{{ $items->price}}" name="price" class="w-2/4 ml-5 p-2 text-black rounded-lg">
            
        </div>
        <a href="{{ route('items.index') }}" class="bg-purple-600 text-white p-3 border border-green-800 rounded-lg">Back</a>
        <input type="submit" value="Edit" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg m-2">
    </form>
</div>
    
@endsection