<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() :View {
        $about = About::find(1);
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param About $about
     * @return View
     */
    public function edit(About $about): View {
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param About $about
     * @return RedirectResponse
     */
    public function update(About $about): RedirectResponse {
        $about->update(request()->validate([
            'section1' => 'required|min:40|max:512',
            'section2' => 'required|max:512',
            'section3' => 'required|max:512',
        ]));
        Log::info(auth()->user()->name . ' has updated the about page');
        return redirect('/about')->with('status', 'About page successfully updated!');
    }
}
