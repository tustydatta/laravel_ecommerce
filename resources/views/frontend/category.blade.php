@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">

    <h1 class="text-6xl pt-10 leading-tight text-orange-400">{{ $cat->name }}</h1>
	<p class="text-xl leading-10 text-justify my-2">Grocify offer a wide range of products, including fresh products, meats, dairy,  meats, dairy, baked goods and non-perishable items.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($items as $item)
        @if($cat->id == $item->category_id)
        <div class="w-full h-auto border border-sm border-white rounded-lg border-rounded-lg backdrop-blur-3xl">
            <a href="{{ route('product', $item->id) }}">
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
        @endif
        @empty
            <div>
                <p>No products found</p>
            </div>
        @endforelse

    </div>

</div>
@endsection