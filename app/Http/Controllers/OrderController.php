<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal de orders op van de ingelogde gebruiker
        $orders = Order::where('user_id', Auth::id())->get();

        return view('orders.index', compact('orders'));
    }

    public function buy(Product $product)
    {
        $user = Auth::user();

        // Controleer of de gebruiker genoeg saldo heeft
        if ($user->credit < $product->price) {
            return redirect()->back()->with('error', 'Not enough credit!');
        }

        // Trek het bedrag af
        $user->credit -= $product->price;
        $user->save();

        // Maak een nieuwe order aan
        Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'order_status' => 1,
        ]);

        return redirect()->route('welcome')->with('success', 'Product bought!');
    }
}
