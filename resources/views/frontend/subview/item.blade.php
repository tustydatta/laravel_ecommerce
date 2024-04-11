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

    @php
        $cart_ids = session('cart_ids');
    @endphp
    @if(!empty($cart_ids))
        @if(in_array($item->id, $cart_ids))
            <div class="w-full py-3 text-center bg-gray-500">Cart added</div>
        @else
            @include('frontend.subview.item_cart_btn')
        @endif
    @else
        @include('frontend.subview.item_cart_btn')
    @endif
        
    @php
        $wish_ids = session('wish_ids');
    @endphp

    @if(!empty($wish_ids))
        @if(in_array($item->id, $wish_ids))
            <div class="w-full py-3  bg-stone-800  text-center rounded-b-lg">Wish Added</div>
        @else
            @include('frontend.subview.item_wish_btn')
        @endif
    @else
        @include('frontend.subview.item_wish_btn')
    @endif

    
</div>