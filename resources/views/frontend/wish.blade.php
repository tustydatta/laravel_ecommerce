@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">

    <h1 class="text-2xl text-center mt-8">Wish List</h1>
    <table class="border-collapse w-full text-center"> 
            <thead>
                <tr class="border-b border-white text-xl text-orange-400">
                    <th class="py-4 ">Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($items)
                    @php($i = 1)
                    @foreach ($items as $wish_data)
                    <tr class="border-b border-white">
                        <td class="py-4">{{ $i++ }}</td>
                        <td class="py-4">{{ $wish_data->name }}</td>
                        <td>
                            <img src="{{ asset('images/items/'.$wish_data->image) }}" alt="" class="h-16 w-20 mx-auto">
                        </td>
                        <td>{{ $wish_data->price }}</td>
                        <td>
                            <a href="{{ route('wish_checkout', $wish_data->id) }}" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg m-2">ADD to cart</a>
                            
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">There is no data in wish list</td>
                    </tr>
                @endif
            </tbody>
        </table>

</div>
@endsection