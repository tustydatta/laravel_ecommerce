@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">
    @forelse($menuCategory as $cat)

    <a href="{{ route('category_product', $cat->id) }}">
        <div class="shadow-2xl px-8 py-4">
            <h1 class="text-6xl pt-4 leading-tight text-orange-400">{{ $cat->name }}</h1>
            <img src="{{ asset('images/category/'.$cat->image) }}" alt="not" class="h-auto w-3/4">
            <p class="text-xl leading-10 text-justify my-2">Grocify offer a wide range of products, including fresh products, meats, dairy,  meats, dairy, baked goods and non-perishable items.</p>
        </div>
    </a>
    

    @empty
        <div>
            <p>No category found</p>
        </div>
    @endforelse
</div>
@endsection