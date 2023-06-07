<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Cart;


class CartService
{
    public static function getItemsInCart($items)
    {
        $products = [];

        foreach($items as $item) {
            $p = Product::findOrFail($item->product_id);
            $admin = $p->admin->select('name', 'email')->first()->toArray(); // オーナー情報
            $values = array_values($admin); // 連想配列の値を取得
            $keys = ['adminName', 'email'];
            $adminInfo = array_combine($keys, $values); // オーナー情報のキーを変更
            
            $product = Product::where('id', $item->product_id)
                        ->select('id', 'name', 'price')->get()->toArray(); // 商品情報の配列

            $quantity = Cart::where('product_id', $item->product_id)
                        ->select('quantity')->get()->toArray(); // 在庫数の配列

            $result = array_merge($product[0], $adminInfo, $quantity[0]); // 配列の結合
            array_push($products, $result);
        }  
        
        return $products;
    }
}