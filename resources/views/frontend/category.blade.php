@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">

    <h1 class="text-6xl pt-10 leading-tight text-orange-400">{{ $cat->name }}</h1>
	<p class="text-xl leading-10 text-justify my-2">Grocify offer a wide range of products, including fresh products, meats, dairy,  meats, dairy, baked goods and non-perishable items.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($items as $item)
            @if($cat->id == $item->category_id)
                @include('frontend.subview.item', ['item' => $item])
            @endif
        @empty
            <div>
                <p>No products found</p>
            </div>
        @endforelse

    </div>

</div>
@endsection