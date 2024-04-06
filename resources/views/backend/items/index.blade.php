@extends('layouts.backend')

@section('content')

    @if(session('success'))
    <div x-data="{ open: true }">
        <div class="w-ful bg-green-400 px-6 py-5 flex flex-row justify-between" 
        x-show="open">
            <p>{{ session('success') }}</p>
            <i class="fa fa-close text-lg" x-on:click="open =! open"></i>
        </div>
    </div>
    @endif

    <h1 class="text-center text-3xl mt-12">Products</h1>
    <div class="bg-orange-400 h-1 w-20 mx-auto mt-1"></div>
    <div class="mx-8 my-2 float-right">
        <a href="{{ route('items.create') }}" class="bg-green-700 text-white p-3 border border-green-800 rounded-lg">Add</a>
    </div>
    <div class="m-8">
        <table class="border-collapse w-full text-center"> 
            <thead>
                <tr class="border-b border-white text-xl text-orange-400">
                    <th class="py-4 ">Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($items as $item)
                <tr class="border-b border-white">
                    <td class="py-4">{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <img src="{{ asset('images/items/'.$item->image) }}" alt="" class="h-16 w-20 mx-auto">
                    </td>
                    <td>{{ $item->price }} tk/-</td>
                    <td class="flex flex-row justify-center">
                        <a href="{{ route('items.edit', $item->id) }}" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg m-2">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" class="bg-red-700 text-white p-3 border border-red-800 rounded-lg m-2" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection