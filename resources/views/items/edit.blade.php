@extends('layouts.app')

@section('content')
<div class="border border-white text-center py-6">
    <form action="{{ route('items.update', $items->id) }}" method="post">
        <h1 class="mb-4 text-2xl text-orange-400">Change the item</h1>

        @csrf
        @method('PUT')

        <div class="w-full mb-4">
            <label class="text-xl">Name</label>
            <input type="text" value="{{ $items->name }}" name="name" class="w-2/4 ml-4 p-2 text-black rounded-lg">
            
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