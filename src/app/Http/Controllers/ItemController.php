<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __construct()
    {   
        $this->middleware(function ($request, $next){
            $id = $request->route()->parameter('item');
            if (!is_null($id)) {
                $itemId = Product::where('is_selling', true)->where('id', $id)->exists();
                if (!$itemId) {
                    abort(404);
                }
            } 
            return $next($request);
        });

    }

    public function index ()
    {
        // 在庫情報を取得するクエリ
        $stocks = DB::table('t_stocks')
            ->select('product_id', DB::raw('sum(quantity) as quantity'))
            ->groupBy('product_id')
            ->having('quantity', '>=', 1)
            ->pluck('quantity', 'product_id'); // 在庫数を商品IDをキーにした連想配列で取得

        // 在庫が1以上の商品のみ取得するクエリ
        $products = Product::with('category')
            ->where('is_selling', true)
            ->whereIn('id', array_keys($stocks->toArray())) // 在庫がある商品IDのみを絞り込む
            ->get();

        return view('items.index', compact('products'));
    }

    public function show ($id)
    {
        $product = Product::findOrFail($id);

        $images = [
            $product->imageFirst->filename ?? null,
            $product->imageSecond->filename ?? null,
            $product->imageThird->filename ?? null,
            $product->imageFourth->filename ?? null,
        ];

        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        return view('items.show', compact('product', 'images', 'quantity'));
    }

    public function thanks ()
    {
        return view('items.thanks');
    }
}
