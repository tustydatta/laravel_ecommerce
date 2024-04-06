@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">
    <div class="shadow-2xl backdrop-blur-xl grid grid-cols-1 md:grid-cols-2 py-8 gap-8">
        <div class="md:mx-auto">
            <img src="{{ asset('images/items/'.$item->image) }}" alt="" class="w-96 h-auto">
        </div>
        <div>
            <h1 class="text-2xl ">{{ $item->name }}</h1>
            <p class="text-xl my-2">Price: {{ $item->price }}tk/-</p>
            <div>
                <button class="w-1/3 py-3 mr-4 bg-purple-700 hover:bg-purple-500" 
                    @click="cart_count++"
                    onClick="this.disabled=true;"
                >
                    Add to cart
                </button>
                <button class="w-1/3 py-3  bg-green-800 hover:bg-green-600  rounded-b-lg">Add to Wishlist</button>
            </div>
        </div>
  
    </div>
    

</div>
@endsection