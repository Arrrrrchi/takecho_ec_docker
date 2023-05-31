<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use InterventionImage;
use App\Models\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

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

                // Stock::create([
                //     'product_id' => $product->id,
                //     'type' => 1,
                //     'quantity' => $request->quantity,
                // ]);
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
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $images = Image::where('admin_id', Auth::id())
        ->select('id', 'title', 'filename')
        ->orderby('updated_at', 'desc')
        ->get();
        

        $productImages = [];
        if ($product->imageFirst && $product->imageFirst->filename) {
            $productImages[0] = $product->imageFirst->filename;
        }
        if ($product->imageSecond && $product->imageSecond->filename) {
            $productImages[1] = $product->imageSecond->filename;
        }
        if ($product->imageThird && $product->imageThird->filename) {
            $productImages[2] = $product->imageThird->filename;
        }
        if ($product->imageFourth && $product->imageFourth->filename) {
            $productImages[3] = $product->imageFourth->filename;
        }

        return view('admin.products.edit', compact('product', 'images', 'categories', 'productImages'));
    }

    public function update(ProductRequest $request, string $id)
    {

        $product = Product::findOrFail($id);

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
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()
            ->route('admin.products.index')
            ->with([
                'message' => '商品を更新しました',
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
