<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['all'] = Product::with('category')->paginate(10);
        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cat_all'] = Category::all();
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable',
        ]);

        $path=null;
       

        if($request->hasFile('image')){
            $path=$request->file('image')->store('product', 'public');
        }
    
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$path,
            'category_id' => $request->category_id,
            'status' => $request->status == true ? 1 : 0,
        ]);
    
        return redirect()->route('product.index')->with('status', 'Product created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data['edt_all'] = Category::all();
        $data['product'] = $product; 
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product', 'public');
    
            
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
    
            $product->image = $path;
        }
    
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id, 
            'status' => $request->status == true ? 1 : 0,
        ]);
        $product->save();
        return redirect()->route('product.index')->with('status', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Product deleted successfully!');
    }
}
