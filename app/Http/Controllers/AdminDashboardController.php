<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Type;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function productIndex()
    {
        return view('admin.product', [
            'products' => Product::all()
        ]);
    }

    public function userIndex()
    {
        $users = User::with('roles')->get();
        return view('admin.user', compact('users'));
    }
}
