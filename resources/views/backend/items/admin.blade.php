@extends('layouts.frontend')

@section('content')
<div>
  <div class="h-16 w-full border border-red-600 text-center">
    <h1>This is heading</h1>
  </div>
  <div class="flex flex-row">
    <div class="h-96 w-1/3 border border-green-800 bg-slate-300">
      <div class="mb-1 p-3 hover:bg-slate-100">
        <a href="#">Dashboard</a>
      </div>
      <div class="mb-1 p-3 hover:bg-slate-100">
        <a href="#">Products</a>
      </div>
      <div class="mb-1 p-3 hover:bg-slate-100">
        <a href="#">Product Category</a>
      </div>
    </div>

    <div class="h-96 w-2/3 border border-black">
      <p>this is main menu</p>
    </div>
  </div>

  <div class="h-16 w-full border border-red-600">
    <h1>this is footer</h1>
  </div>
</div>


@endsection