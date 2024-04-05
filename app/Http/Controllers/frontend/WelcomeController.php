<?php
namespace App\Http\Controllers\frontend;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home()
    {    $items = Item::all();
        return view('frontend.home', compact('items'));
    }
}
