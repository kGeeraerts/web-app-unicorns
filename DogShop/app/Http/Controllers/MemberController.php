<?php

namespace App\Http\Controllers;

use App\Mail\AccountTerminated;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Log;

class MemberController extends Controller {

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View {
        return view('admin.members.index', ['users' => User::paginate(10)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View {
        return view('profile.member', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View {
        return view('admin.members.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function update(User $user): RedirectResponse {
        foreach (get_all_roles_names() as $roleName) {
            if (isset(request()->$roleName)) {
                $user->assignRole($roleName);
                Log::info(auth()->user()->name . ' has added role ' . $roleName);
            } else {
                $user->removeRole($roleName);
                Log::info(auth()->user()->name . ' has removed role ' . $roleName);
            }
        }
        $user->save();
        return redirect('/admin/members')->with('status', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user): RedirectResponse {
        Mail::to($user->email)->send(new AccountTerminated($user));
        $user->delete();
        Log::info(auth()->user()->name . ' has deleted ' . $user->name);
        return redirect('/admin/members')->with('status', 'User successfully removed');
    }
}
