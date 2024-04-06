@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 py-8 gap-8">
        <div class="md:mx-auto">
            <img src="{{ asset('images/items/'.$item->image) }}" alt="" class="w-96 h-auto">
        </div>
        <div>
            <h1>{{ $item->name }}</h1>
            <p>{{ $item->price }}</p>
        </div>
  
    </div>
    

</div>
@endsection