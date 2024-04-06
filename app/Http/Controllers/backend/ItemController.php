<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // $phone = Item::find(1)->category;
        // dd($phone->name); exit();
        
        $items = Item::all();
        return view('backend.items.index', compact('items'));
    }

    public function create()
    {
        $category = Category::all();
        return view('backend.items.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);
        $item_data = $request->all();
       
        $imageName = time().'.'.$request->image->extension();
        $item_data['image'] = $imageName; 
       
        $request->image->move(public_path('images/items'), $imageName);

        Item::create($item_data);
        return redirect()->route('items.index')
                    ->with('success', 'Items now added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $items = Item::find($id);
        $category = Category::all();
        return view('backend.items.edit', compact('items', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $items = Item::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $item_data = $request->all();

        if ($request->file('image')) 
        {
            //if image given on file
            $request->validate([
                'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
            ]);

            // old image delete
            File::delete('images/items/'.$items->image);
            
            $imageName = time().'.'.$request->image->extension();
            $item_data['image'] = $imageName; 
            
            //new image upload
            $request->image->move(public_path('images/items'), $imageName);
        }

        $items->update($item_data);

        return redirect()->route('items.index')
                ->with('success', 'Items update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Item::find($id);
        File::delete('images/items/'.$items->image);
        $items->delete();
        return redirect()->route('items.index')
                    ->with('success', 'Item delete');
    }
}
