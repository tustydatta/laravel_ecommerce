<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use App\Models\Checkout;

class WelcomeController extends Controller
{
    
    public function test(Request $request, $product_id)
    {  
        // $request->session()->flush();
        $request->session()->forget('cart_ids');
        $request->session()->forget('wish_ids');
        // return true;
    }

    public function CartCount(Request $request)
    {
        if($request->session()->has('cart_ids'))
        {
            return count($request->session()->get('cart_ids'));
        }
        else {
            return 0;
        }
    }

    public function CartAdd(Request $request, $product_id)
    {   
        if($request->session()->has('cart_ids'))
        {
            $request->session()->push('cart_ids', $product_id);
        }
        else {
            $request->session()->put('cart_ids', [$product_id]);
        }
        return true;
    }

    public function Cart(Request $request)
    {
        $menuCategory = Category::all();
        $products_ids = $request->session()->get('cart_ids');

        if($request->session()->has('cart_ids'))
        {
            $items = Item::whereIn('id', $products_ids)->get();
            return view('frontend.cart', compact('items', 'menuCategory'));
        }
        else {
            $items = false;
            return view('frontend.cart', compact('items', 'menuCategory'));
        }        
    }

    public function Checkout(Request $request)
    {   
        if (Auth::check()) {
            $menuCategory = Category::all();
            $product_ids = $request->session()->get('cart_ids');

            foreach($product_ids as $product) {
                echo $product;
                // $checkout = new Checkout;
                // $checkout->user_id = Auth::id();
                // $checkout->product_id = $request->name;
                // $checkout->quantity = $request->name;
                // $checkout->total_price = $request->name;
                // $checkout->save();
            }
            exit();

            $items = Item::whereIn('id', $checkouts_ids)->get();

            $user_info = User::find(Auth::id());
            $payment_type = ["Cash On Delivery", "Bank", "MFS"];
            $payment_method = ["Bkash", "Nogod", "Rocket"];
            return view('frontend.checkout', compact('items', 'menuCategory', 'user_info', 'payment_type', 'payment_method'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function checkoutProductList(Request $request) {
        $checkouts_ids = $request->session()->get('cart_ids');
        $items = Item::whereIn('id', $checkouts_ids)->get();

        return view('frontend.subview.checkout_product_list_table', compact('items'));
    }

    public function SingleCheckout(Request $request, $product_id)
    {   
        // $menuCategory = Category::all();
        // $items = Item::whereIn('id', $checkouts_ids)->get();
        // $id = Auth::id();
        // if (Auth::check($id)) {
        //     return view('frontend.checkout', compact('items', 'menuCategory'));
        // }
        // else{
        //     return redirect()->route('login');
        // }
    }

    public function WishCheckOut(Request $request, $product_id)
    {
        if($request->session()->has('cart_ids'))
        {
            $request->session()->push('cart_ids', $product_id);
        }
        else {
            $request->session()->put('cart_ids', [$product_id]);
        }
        $aaa = $request->session()->pull('wish_ids');
        // $request->session()->forget('wish_ids');
        // dd($aaa); exit();
        
        $newarray = array_diff($aaa, [$product_id]);
        //  dd($newarray); exit();

        $request->session()->put('wish_ids', $newarray);
        return redirect()->route('cart');
    }

    public function WishCount(Request $request)
    {
        if($request->session()->has('wish_ids'))
        {
            return count($request->session()->get('wish_ids'));
        }
        else {
            return 0;
        }
    } 

    public function WishAdd(Request $request, $product_id)
    {
        if($request->session()->has('wish_ids'))
        {
            $request->session()->push('wish_ids', $product_id);
        }
        else {
            $request->session()->put('wish_ids', [$product_id]);
        }
        return true;
    }

    public function Wish(Request $request)
    {
        // dd($request->session()->get('wish_ids'));
        // exit();
        $menuCategory = Category::all();
        $products_ids = $request->session()->get('wish_ids');

        if($request->session()->has('wish_ids'))
        {
            $items = Item::whereIn('id', $products_ids)->get();
            return view('frontend.wish', compact('items', 'menuCategory'));
        }
        else {
            $items = false;
            return view('frontend.wish', compact('items', 'menuCategory'));
        }
    }

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
