<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Stock;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        $images = Image::where('admin_id', Auth::id())
            ->select('id', 'title', 'filename')
            ->orderby('updated_at', 'desc')
            ->get();

        return view('admin.products.create', compact('categories', 'images'));
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use($request) {
                $product = Product::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'sort_order' => $request->sort_order,
                    'admin_id' => Auth::id(),
                    'category_id' => $request->category,
                    'image1' => $request->image1,
                    'image2' => $request->image2,
                    'image3' => $request->image3,
                    'image4' => $request->image4,
                    'is_selling' => $request->is_selling,
                ]);

                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' => $request->quantity,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()
            ->route('admin.products.index')
            ->with([
                'message' => '商品を登録しました',
                'status' => 'info'
            ]);
    }

    public function edit(string $id)
    {
        $product = Product::with('imageFirst', 'imageSecond', 'imageThird', 'imageFourth')->findOrFail($id);
        $categories = Category::all();

        $images = Image::where('admin_id', Auth::id())
        ->select('id', 'title', 'filename')
        ->orderby('updated_at', 'desc')
        ->get();
        
        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        $productImages = [];
        if ($product->imageFirst && $product->imageFirst->filename) {
            $productImages[0]['id'] = $product->imageFirst->id;
            $productImages[0]['filename'] = $product->imageFirst->filename;
        } else {
            $productImages[0] = '';
        }
        if ($product->imageSecond && $product->imageSecond->filename) {
            $productImages[1]['id'] = $product->imageSecond->id;
            $productImages[1]['filename'] = $product->imageSecond->filename;
        } else {
            $productImages[1] = '';
        }
        if ($product->imageThird && $product->imageThird->filename) {
            $productImages[2]['id'] = $product->imageThird->id;
            $productImages[2]['filename'] = $product->imageThird->filename;
        } else {
            $productImages[2] = '';
        }
        if ($product->imageFourth && $product->imageFourth->filename) {
            $productImages[3]['id'] = $product->imageFourth->id;
            $productImages[3]['filename'] = $product->imageFourth->filename;
        } else {
            $productImages[3] = '';
        }

        return view('admin.products.edit', compact('product', 'images', 'categories','quantity', 'productImages'));
    }

    public function update(ProductRequest $request, string $id)
    {
       
        $request->validate([
            'current_quantity' => 'required|integer',
        ]);
        
        $product = Product::findOrFail($id);

        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        /* 編集中に他の人の操作で在庫数が変わっていた時の処理 */
        if($request->current_quantity != $quantity) {
            $id = $request->route()->parameter('product');
            return redirect()->route('admin.products.edit', ['product' => $id])
                ->with([
                    'message' => '在庫数が変更されています。再度確認してください。',
                    'status' => 'alert'
                ]);
        }

        try {
            DB::transaction(function () use($request, $product) {
                $product->name = $request->name;
                $product->information = $request->information;
                $product->price = $request->price;
                $product->sort_order = $request->sort_order;
                $product->category_id = $request->category;
                $product->image1 = $request->image1;
                $product->image2 = $request->image2;
                $product->image3 = $request->image3;
                $product->image4 = $request->image4;
                $product->is_selling = $request->is_selling;
                $product->save();

                if ($request->type === \Constant::PRODUCT_LIST['add']) {
                    $newQuantity = $request->quantity;
                } elseif ($request->type === \Constant::PRODUCT_LIST['reduce']) {
                    $newQuantity = $request->quantity * -1;
                }
                Stock::create([
                    'product_id' => $product->id,
                    'type' => $request->type,
                    'quantity' => $newQuantity,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()
            ->route('admin.products.index')
            ->with([
                'message' => '商品情報を更新しました',
                'status' => 'info'
            ]);

    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
        ->route('admin.products.index')
        ->with([
            'message' => '商品を削除しました',
            'status' => 'alert'
        ]);
        
    }
}
