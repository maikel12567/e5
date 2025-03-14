<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_type' => 'required|integer',
            'material' => 'required|string|max:255',
            'production_time' => 'required|string|max:255',
            'complexity' => 'required|string|max:255',
            'sustainability' => 'required|string|max:255',
            'unique_properties' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'product_type' => $request->product_type,
            'material' => $request->material,
            'production_time' => $request->production_time,
            'complexity' => $request->complexity,
            'sustainability' => $request->sustainability,
            'unique_properties' => $request->unique_properties,
            'price' => $request->price,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->update(['image' => $imagePath]);
        }

        return redirect()->route('products.index')->with('success', 'Product succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_type' => 'required|integer',
            'material' => 'required|string|max:255',
            'production_time' => 'required|string|max:255',
            'complexity' => 'required|string|max:255',
            'sustainability' => 'required|string|max:255',
            'unique_properties' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'product_type' => $request->product_type,
            'material' => $request->material,
            'production_time' => $request->production_time,
            'complexity' => $request->complexity,
            'sustainability' => $request->sustainability,
            'unique_properties' => $request->unique_properties,
            'price' => $request->price
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->update(['image' => $imagePath]);
        }

        return redirect()->route('products.index')->with('success', 'Product succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {}
}
