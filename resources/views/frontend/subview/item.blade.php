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
    </a>
    <button class="w-full py-3  bg-purple-700 hover:bg-purple-500" 
        @click="cart_count++"
        onClick="this.disabled=true;"
    >
        Add to cart
    </button>
    <button class="w-full py-3  bg-green-800 hover:bg-green-600  rounded-b-lg" onclick="abc({{ $item->id }})">Add to Wishlist</button>
</div>