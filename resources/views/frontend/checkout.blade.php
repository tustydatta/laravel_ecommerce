@extends('layouts.frontend')
@section('content')

<div class="container mx-auto">
    <div id="checkout_product_list_table">
        @include('frontend.subview.checkout_product_list_table')
    </div>

    
    <div class="text-center py-6">
        <h3 class="mb-4 text-2xl text-orange-400 mb-6">User Info</h3>
        <form action="" method="post" class="border border-white w-4/5 mx-auto py-8">
            @csrf
            <div class="w-full mb-4">
                <label for="name" class="text-xl">Name</label>
                <div>
                    <input type="text" name="name" placeholder="enter your name" class="w-2/4 mt-3 ml-4 p-2 rounded-lg text-black">
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="email" class="text-xl">E-mail</label>
                <div>
                    <input type="email" name="email" placeholder="enter your email address" class="w-2/4 mt-3 ml-4 p-2 rounded-lg text-black">
                </div>
            </div>

            <div>
                <input type="submit" value="checkout" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg">
            </div>
        </form>
    </div>

</div>
@endsection