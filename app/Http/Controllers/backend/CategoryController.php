<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $item_data = $request->all();
       
        $imageName = time().'.'.$request->image->extension();
        $item_data['image'] = $imageName; 
       
        $request->image->move(public_path('images/category'), $imageName);

        Category::create($item_data);
        return redirect()->route('category.index')
                    ->with('success', 'category now added');
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
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => 'required',
        ]);

        $item_data = $request->all();

        if ($request->file('image')) 
        {
            //if image given on file
            $request->validate([
                'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
            ]);

            // old image delete
            File::delete('images/category/'.$category->image);
            
            $imageName = time().'.'.$request->image->extension();
            $item_data['image'] = $imageName; 
            
            //new image upload
            $request->image->move(public_path('images/category'), $imageName);
        }

        $category->update($item_data);

        return redirect()->route('category.index')
                ->with('success', 'category update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        File::delete('images/category/'.$category->image);
        $category->delete();
        return redirect()->route('category.index')
                    ->with('success', 'Category delete');
    }

}
