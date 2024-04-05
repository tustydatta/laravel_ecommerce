<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        return view('items.edit', compact('items'));
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
