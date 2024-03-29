<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\CartService;
use App\Jobs\SendTanksMail;
use App\Jobs\SendOrderedMail;


class CartController extends Controller
{
    public function index () 
    {
        $user = User::findOrfail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;

        foreach($products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }

        return view('user.cart', compact('products', 'totalPrice'));
    }

    public function add (Request $request)
    {
        Session::start();

        $itemInCart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())->first();

        if ($itemInCart) {
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        Session::save();
        
        return redirect()->route('cart.index');
    }

    public function delete ($id)
    {
        Cart::where('product_id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('cart.index');        
    }

    public function checkout ()
    {
        $user = User::findOrfail(Auth::id());
        $products = $user->products;
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        $lineItems = [];

        foreach($products as $product) {
            $quantity = '';
            $quantity = Stock::where('product_id', $product->id)->sum('quantity');

            if ($product->pivot->quantity > $quantity) {
                return redirect()->route('cart.index');
            } else {
                $stripe_products = $stripe->products->create([
                    'name' => $product->name,
                    'description' => $product->information,
                ]); 
                $stripe_price = $stripe->prices->create([
                    'product' => $stripe_products,
                    'unit_amount' => $product->price,
                    'currency' => 'jpy',
                ]);
                $lineItem = [
                    'price' => $stripe_price,
                    'quantity' => $product->pivot->quantity,
                ];
                array_push($lineItems, $lineItem);    
            }
        }

        /* ストライプに渡す前に在庫を減らす */
        foreach ($products as $product) {
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['reduce'],
                'quantity' => $product->pivot->quantity * -1,
            ]);
        }

        /* チェックアウトセッションを作成する */
        $session = $stripe->checkout->sessions->create([
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('cart.success'),
            'cancel_url' => route('cart.cancel'),
        ]);

        $publicKey = config('services.stripe.public');

        return view('user.checkout', compact('session', 'publicKey'));
    }

    public function success ()
    {
        $items = Cart::where('user_id', Auth::id())->get();
        $products = CartService::getItemsInCart($items);
        $adminEmail = $products[0]['email'];
        $user = User::findOrfail(Auth::id());

        SendTanksMail::dispatch($products, $user);
        SendOrderedMail::dispatch($products, $user, $adminEmail);
        
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('items.thanks');
    }

    public function cancel ()
    {
        $user = User::findOrfail(Auth::id());

        foreach ($user->products as $product) {
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->quantity,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with([
                'message' => '購入をキャンセルしました',
                'status' => 'alert'
            ]);
    }


}
