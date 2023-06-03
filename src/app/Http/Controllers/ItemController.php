<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class ItemController extends Controller
{
    public function index ()
    {
        $products = Product::with('category')->where('is_selling', true)->get();

        return view('items.index', compact('products'));
    }

    public function show ($id)
    {
        $product = Product::findOrFail($id);

        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        return view('items.show', compact('product', 'quantity'));
    }
}
