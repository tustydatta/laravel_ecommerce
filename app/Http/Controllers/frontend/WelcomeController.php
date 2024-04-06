<?php
namespace App\Http\Controllers\frontend;

use App\Models\Item;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home()
    {   
        $items = Item::all();
        $menuCategory = Category::all();
        return view('frontend.home', compact('items','menuCategory'));
    }

    public function allCategory()
    {   
        $menuCategory = Category::all();
        return view('frontend.all_category', compact('menuCategory'));
    }

    public function Category($category_id)
    {   
        $menuCategory = Category::all();
        $cat = Category::find($category_id);
        $items = Item::where('category_id', $category_id)->get();
        return view('frontend.category', compact('items', 'cat', 'menuCategory'));
    }

    public function Product($product_id)
    {   
        $menuCategory = Category::all();
        $item = Item::find($product_id);
        return view('frontend.product', compact('item', 'menuCategory'));
    }
    
}
