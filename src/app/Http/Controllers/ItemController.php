<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ItemController extends Controller
{
    public function index ()
    {
        $products = Product::with('category')->where('is_selling', true)->get();

        return view('items.index', compact('products'));
    }
}
