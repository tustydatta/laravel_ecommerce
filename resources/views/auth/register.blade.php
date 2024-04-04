@extends('layouts.app')
@section('content')

<div class="border border-white text-center py-6">
    <h3 class="mb-4 text-4xl text-orange-400">Register</h3>
    <form action="{{ route('store') }}" method="post" >
        @csrf
        <div class="w-full mb-4">
            <label for="name" class="text-xl">Name</label>
            <div class="">
                <input type="text" class="w-2/4 ml-4 p-2 rounded-lg text-black" name="name" placeholder="enter your user name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="w-full mb-4">
            <label for="email" class="text-xl">E-mail</label>
            <div>
                <input type="email" class="w-2/4 ml-4 p-2 rounded-lg text-black" name="email" placeholder="enter your email address" value="{{ old('email') }}">
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="w-full mb-4">
            <label for="password" class="text-xl">Password</label>
            <div>
                <input type="password" class="w-2/4 ml-4 p-2 rounded-lg text-black" name="password" placeholder="enter your password">
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="w-full mb-4">
            <label for="password_confirmation" class="text-xl">Confirm Password</label>
            <div>
                <input type="password" class="w-2/4 ml-4 p-2 rounded-lg text-black" name="password_confirmation" placeholder="Confirm your password">
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <div>
            <input type="submit" value="Register" class="bg-green-700 text-white p-3 border border-green-800 rounded-lg">
        </div>
    </form>
</div>
@endsection