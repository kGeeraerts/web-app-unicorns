<?php

namespace App\Http\Controllers;

use App\Mail\OrderReceived;
use App\Models\Cart;
use App\Models\Dog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Log;

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
            Log::info(auth()->user()->name . ' has added an item to the cart');
        } else {
            $cart = Cart::firstOrCreate([
                'session_id' => auth()->getSession()->getId(),
            ]);
            Log::info(auth()->getSession()->getId() . ' has added an item to the cart');
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
            Log::info(auth()->user()->email . ' has ordered');
        } else {
            $email = request()->validate([
                'email' => 'required|email'
            ]);
            Mail::to($email)->send(new OrderReceived($cart));
            Log::info(reset($email) . ' has ordered');
        }
        $cart->dogs()->delete();
        return redirect('home')->with('status', 'Appointment request received');
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
        if (request('model') == "dog") {
            $dog = Dog::find(request()->item);
            $cart->dogs()->save($dog);
            return redirect()->back()->with('status', 'Dog added to appointment!');
        } else {
            Log::error(auth()?->user()?->name ?? auth()->getSession()->getId() . ' wants to save a non-existent item from the cart ');
            return redirect()->back()->with('status', 'ERROR: NOT POSSIBLE TO ADD');
        }
    }

    protected function remove_item($cart, $item): RedirectResponse {
        if (request('model') == "dog") {
            $cart->dogs()->where('cartable_id', $item)->delete();
            return redirect()->back()->with('status', 'Dog deleted from appointment!');
        } else {
            Log::error(auth()?->user()?->name ?? auth()->getSession()->getId() . ' wants to remove a non-existent item from the cart ');
            return redirect()->back()->with('status', 'ERROR: NOT POSSIBLE TO DELETE');

        }
    }
}
