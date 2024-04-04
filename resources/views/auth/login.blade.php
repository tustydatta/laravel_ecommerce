@extends('layouts.app')
@section('content')
<div class="border border-white text-center py-6">
    <h3 class="mb-4 text-4xl text-orange-400">Login</h3>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <div class="w-full mb-4">
            <label for="email" class="text-xl">E-mail</label>
            <div>
                <input type="email" name="email" placeholder="enter your email address" class="w-2/4 ml-4 p-2 rounded-lg text-black">
            </div>
        </div>

        <div class="w-full mb-4">
            <label for="password" class="text-xl">Password</label>
            <div>
                <input type="password" name="password" placeholder="enter your password" class="w-2/4 ml-4 p-2 rounded-lg text-black">
            </div>
        </div>

        <div>
            <input type="submit" value="Login" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg">
        </div>
    </form>
</div>
@endsection