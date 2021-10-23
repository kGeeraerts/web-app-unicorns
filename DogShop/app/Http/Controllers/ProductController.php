<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller {

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View {
        if (auth()->user()?->can('view-unavailable-products')) {
            $products = Product::orderBy('name', 'asc')->paginate(9);
        } else {
            $products = Product::where('available', 1)->orWhere('user_id', auth()?->id())->latest()->orderBy('name', 'asc')->paginate(9);
        }
        return view('products.index' ,compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse {
        $product = new Product(request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:40|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
        ]));

        if (isset(request()->available)) {
            $product->available = 1;
            $product->available_from = now();
        }

        $path = "undefined";
        if (request()->image->isValid()) {
            $path = request()->image->store('public/product-images');
        }
        $product->image = substr_replace($path, '',0,6);
        $product->user_id = auth()->id();

        $product->save();
        return redirect('/products')->with('status', 'Product successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View {
        return view('products.item', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Product $product): RedirectResponse {
        $product->update(request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:40|max:255',
            'price' => 'required|numeric|min:0',
//            'image' => 'required|image',
        ]));

        if (isset(request()->available)) {
            $product->available = 1;
            $product->available_from = now();
        } else {
            $product->available = false;
            $product->available_from = null;
        }

        if (isset(request()->image)) {
            $path = "undefined";
            if (request()->image->isValid()) {
                $path = request()->image->store('public/product-images');
            }
            $product->image = substr_replace($path, '', 0, 6);
        }

        $product->save();
        return redirect('/products/' . $product->id)->with('status', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Product $product): RedirectResponse {
//        Storage::delete('/public'.$product->image);// DEV OPTION anders is de foto overal verdwenen
        $product->delete();
        return redirect('/products')->with('status', 'Product successfully deleted!');
    }
}
