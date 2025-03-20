<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Product_Type;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function overview(Request $request)
    {
        $query = Product::query()
            ->leftJoin('product_types', 'products.product_type', '=', 'product_types.id')
            ->select(
                'products.*',
                'product_types.name as type_name'
            );

        // Search by product name
        if ($request->filled('search')) {
            $query->where('products.name', 'like', '%' . $request->input('search') . '%');
        }

        // Filter by product type if provided
        if ($request->filled('product_type')) {
            $query->where('products.product_type', $request->input('product_type'));
        }

        // Filter by complexity (exact match)
        if ($request->filled('complexity')) {
            $query->where('products.complexity', $request->input('complexity'));
        }

        // Filter by sustainability (exact match)
        if ($request->filled('sustainability')) {
            $query->where('products.sustainability', $request->input('sustainability'));
        }

        // Order by price if provided
        if ($request->filled('price')) {
            $order = ($request->input('price') === 'high') ? 'desc' : 'asc';
            $query->orderBy('products.price', $order);
        }

        $products = $query->get();
        $productTypes = Product_Type::all();

        // Fetch distinct complexity options
        $complexityOptions = Product::select('complexity')->distinct()->pluck('complexity');
        $sustainabilityOptions = Product::select('sustainability')->distinct()->pluck('sustainability');

        return view('welcome', compact('products', 'productTypes', 'complexityOptions', 'sustainabilityOptions'));
    }

    public function overviewDashboard(Request $request)
    {
        $query = Product::query()
            ->leftJoin('product_types', 'products.product_type', '=', 'product_types.id')
            ->select(
                'products.*',
                'product_types.name as type_name'
            );

        // Search by product name
        if ($request->filled('search')) {
            $query->where('products.name', 'like', '%' . $request->input('search') . '%');
        }

        // Filter by product type if provided
        if ($request->filled('product_type')) {
            $query->where('products.product_type', $request->input('product_type'));
        }

        // Filter by complexity (exact match)
        if ($request->filled('complexity')) {
            $query->where('products.complexity', $request->input('complexity'));
        }

        // Filter by sustainability (exact match)
        if ($request->filled('sustainability')) {
            $query->where('products.sustainability', $request->input('sustainability'));
        }

        // Order by price if provided
        if ($request->filled('price')) {
            $order = ($request->input('price') === 'high') ? 'desc' : 'asc';
            $query->orderBy('products.price', $order);
        }

        $products = $query->get();
        $productTypes = Product_Type::all();

        // Fetch distinct complexity options
        $complexityOptions = Product::select('complexity')->distinct()->pluck('complexity');
        $sustainabilityOptions = Product::select('sustainability')->distinct()->pluck('sustainability');

        return view('dashboard', compact('products', 'productTypes', 'complexityOptions', 'sustainabilityOptions'));
    }

    public function create()
    {
        $types = Product_Type::all();
        return view('products.create', compact('types'));
    }

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

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function showhome($id)
    {
        $product = Product::findOrFail($id);
        $type = Product_type::find($product->product_type); // Oplossing
        $reviews = Review::where('product_id', $id)->get();
        $type_name = $type->name;

        return view('show', compact('product', 'reviews', 'type_name'));
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $types = Product_Type::all();
        return view('products.edit', compact('product', 'types'));
    }

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

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product succesvol verwijderd!');
    }
}
