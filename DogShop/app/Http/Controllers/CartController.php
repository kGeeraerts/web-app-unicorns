<?php

namespace App\Http\Controllers;

use App\Mail\OrderReceived;
use App\Models\Cart;
use App\Models\Dog;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller {

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->authorizeResource(Cart::class, 'cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse {
        if (auth()->user()) {
            $cart = Cart::firstOrCreate([
                'user_id' => auth()->id(),
            ]);
        } else {
            $cart = Cart::firstOrCreate([
                'session_id' => auth()->getSession()->getId(),
            ]);
        }
        return $this->save_item($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param Cart $cart
     * @return View
     */
    public
    function show(Cart $cart): View {
        return view('cart', compact('cart'));
    }

    /**
     * Order the specified resource.
     *
     * @param Cart $cart
     * @return RedirectResponse
     */
    public function order(Cart $cart): RedirectResponse {
        if (auth()->user()) {
            Mail::to(auth()->user()->email)->send(new OrderReceived($cart));
        } else {
            $email = request()->validate([
                'email' =>'required|email'
            ]);
            Mail::to($email)->send(new OrderReceived($cart));
        }
        $cart->products()->delete();
        $cart->dogs()->delete();
        return redirect('home')->with('status', 'Order Successfully Received');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $item
     * @return RedirectResponse
     */
    public function destroy(mixed $item): RedirectResponse {
        if (auth()->user()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            return $this->remove_item($cart, $item);
        } else {
            $cart = Cart::where('session_id', auth()->getSession()->getId())->first();
            return $this->remove_item($cart, $item);
        }
    }

    protected function save_item($cart): RedirectResponse {
        if (request('model') == "product") {
            $product = Product::find(request()->item);
            $cart->products()->save($product);
            return redirect()->back()->with('status', 'Product added to shopping cart!');
        } elseif (request('model') == "dog") {
            $dog = Dog::find(request()->item);
            $cart->dogs()->save($dog);
            return redirect()->back()->with('status', 'Dog added to shopping cart!');
        } else {
            return redirect()->back()->with('status', 'ERROR: NOT POSSIBLE TO ADD TO CART');
        }
    }

    protected function remove_item($cart, $item): RedirectResponse {
        if (request('model') == "product") {
            $cart->products()->where('cartable_id',$item)->delete();
            return redirect()->back()->with('status', 'Product deleted from shopping cart!');
        } elseif (request('model') == "dog") {
            $cart->dogs()->where('cartable_id',$item)->delete();
            return redirect()->back()->with('status', 'Dog deleted from shopping cart!');
        } else {
            return redirect()->back()->with('status', 'ERROR: NOT POSSIBLE TO DELETE FROM CART');
        }
    }
}
