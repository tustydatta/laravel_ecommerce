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

    <h1 class="text-center text-3xl mt-12">Products Category</h1>
    <div class="bg-orange-400 h-1 w-32 mx-auto mt-1"></div>
    <div class="mx-8 my-2 float-right">
        <a href="{{ route('category.create') }}" class="bg-green-700 text-white p-3 border border-green-800 rounded-lg">Add</a>
    </div>
    <div class="m-8">
        <table class="border-collapse w-full text-center"> 
            <thead>
                <tr class="border-b border-white text-xl text-orange-400">
                    <th class="py-4 ">Id</th>
                    <th>Name</th>
                    <th>slug</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($category as $data)
                <tr class="border-b border-white">
                    <td class="py-4">{{ $i++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->slug }}</td>
                    <td>
                        <img src="{{ asset('images/category/'.$data->image) }}" alt="" class="h-16 w-20 mx-auto">
                    </td>
                    <td>
                        <span class="text-white p-2 border border-sky-800 rounded-full {{ ($data->is_active)?'bg-sky-700':'bg-red-600' }}">
                            {{ ($data->is_active)?'Active':'Inactive' }}
                        </span>
                    </td>
                    <td class="flex flex-row justify-center">
                        <a href="{{ route('category.edit', $data->id) }}" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg m-2">Edit</a>
                        <form action="{{ route('category.destroy', $data->id) }}" class="bg-red-700 text-white p-3 border border-red-800 rounded-lg m-2" method="post">
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