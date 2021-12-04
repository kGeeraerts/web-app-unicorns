<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use \Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller {
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->authorizeResource(Dog::class, 'dog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View {
        if (auth()->user()?->can('view-unavailable-dogs')) {
            $dogs = Dog::orderBy('name', 'asc')->paginate(9);
        } else {
            $dogs = Dog::where('available', 1)->orWhere('user_id', auth()?->id())->latest()->orderBy('name', 'asc')->paginate(9);
        }
        return view('dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View {
        return view('dogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse {
        $dog = new Dog(request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:40|max:255',
            'image' => 'required|image',
        ]));

        if (isset(request()->available)) {
            $dog->available = 1;
            $dog->available_from = now();
        }

        $path = "undefined";
        if (request()->image->isValid()) {
            $path = request()->image->store('public/dog-images');
        }
        $dog->image = substr_replace($path, '', 0, 6);
        $dog->user_id = auth()->id();

        $dog->price = 0;

        $dog->save();
        Log::info(auth()->user()->name . ' has created a new dog');
        return redirect('/dogs')->with('status', 'Dog successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param Dog $dog
     * @return View
     */
    public function show(Dog $dog): View {
        return view('dogs.item', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dog $dog
     * @return View
     */
    public function edit(Dog $dog): View {
        return view('dogs.edit', compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Dog $dog
     * @return RedirectResponse
     */
    public function update(Dog $dog): RedirectResponse {
        $dog->update(request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:40|max:255',
            'image' => 'image',
        ]));

        if (isset(request()->available)) {
            $dog->available = 1;
            $dog->available_from = now();
        } else {
            $dog->available = false;
            $dog->available_from = null;
        }

        if (isset(request()->image)) {
            $path = "undefined";
            if (request()->image->isValid()) {
                $path = request()->image->store('public/dog-images');
            }
            $dog->image = substr_replace($path, '', 0, 6);
        }

        $dog->save();
        Log::info(auth()->user()->name . ' has updated a dog');
        return redirect('/dogs/' . $dog->id)->with('status', 'Dog successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dog $dog
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Dog $dog): RedirectResponse {
        Storage::delete('/public' . $dog->image);
        $dog->delete();
        Log::info(auth()->user()->name . ' has deleted a dog');
        return redirect('/dogs')->with('status', 'Dog successfully deleted!');
    }
}
