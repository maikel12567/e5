<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Type;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // Product
    //////////////////////////////////////////////////////////////////////////////////////////

    public function productIndex()
    {
        return view('admin.product', [
            'products' => Product::all()
        ]);
    }

    public function productCreate()
    {
        return view('admin.product.create', [
            'types' => Product_Type::all()
        ]);
    }

    public function productStore(Request $request)
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

        return redirect()->route('admin.product')->with('success', 'Product succesvol aangemaakt!');
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        $types = Product_Type::all();
        return view('admin.product.edit', compact('product', 'types'));
    }

    public function productUpdate(Request $request, $id)
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

        return redirect()->route('admin.product')->with('success', 'Product succesvol bijgewerkt!');
    }

    public function productDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Product succesvol verwijderd!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // User
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function userIndex()
    {
        $users = User::with('roles')->get();
        return view('admin.user', compact('users'));
    }

    public function userCreate()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'credit' => 'nullable',
            'role' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'credit' => $request->credit,
        ]);

        $user->roles()->attach($request->role);

        return redirect()->route('admin.user')->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    public function userEdit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = \App\Models\Role::all(); // Zorg ervoor dat je een Role model hebt
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'credit' => 'nullable|numeric|min:0',
            'role' => 'required|exists:roles,id'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'credit' => $request->credit,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        $user->roles()->sync([$request->role]);

        return redirect()->route('admin.user')->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.user')->with('success', 'Gebruiker succesvol verwijderd!');
    }

}
