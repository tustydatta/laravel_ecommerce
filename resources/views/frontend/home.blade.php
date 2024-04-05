@extends('layouts.frontend')
@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($items as $item)
        <div class="w-full h-auto border border-sm border-white rounded-lg border-rounded-lg backdrop-blur-3xl">
            <a href="#">
                <div>
                    <img src="{{ asset('images/items/'.$item->image) }}" alt="" class="h-44 w-80 rounded-t-lg">
                </div>
                <div class="text-center text-xl my-2 font-semibold">
                    <h3>{{ $item->name }}</h3>
                </div>
                <div class="flex flex-row justify-center py-2 font-semibold">
                    <p>Price:</p>
                    <p> {{ $item->price }} tk/-</p>
                </div>
                <button class="w-full py-3  bg-purple-700 hover:bg-purple-500">Add to cart</button>
                <button class="w-full py-3  bg-green-800 hover:bg-green-600  rounded-b-lg">Add to Wishlist</button>
            </a>
        </div>
        @empty
            <div>
                <p>No products found</p>
            </div>
        @endforelse

    </div>
</div>
@endsection