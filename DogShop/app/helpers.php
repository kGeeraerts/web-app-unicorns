<?php

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

function all_users_with_answer_messages_permission() {
    $users = User::permission('answer-messages')->get();
    foreach (User::role('owner')->get() as $owner) {
        $users->push($owner);
    }
    return $users;
}

function get_class_name($item): string {
    return substr_replace(get_class($item), '', 0, 11);
}

function get_all_roles_names(): Collection {
    return Role::all()->pluck('name');
}

function pick_dog(): string {
    $dogArray = ['Havanese', 'Golden Retriever', 'German Shepherd Dog', 'Jack Russel', 'Border Collie', 'Husky', 'Maltese', 'Corgi', 'Beagle', 'Chow Chow'];
    $rand_keys = array_rand($dogArray, 1);
    return $dogArray[$rand_keys];
}

function get_cart_id() {
    if (auth()->user()) {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);
        \Illuminate\Support\Facades\Log::alert("get_cart_id:User");
    } else {
        try {
            $cart = Cart::firstOrCreate([
                'session_id' => auth()->getSession()->getId(),
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {
            \Illuminate\Support\Facades\Redirect::home();
            \Illuminate\Support\Facades\Log::info($exception);
            return 0;
        }
        \Illuminate\Support\Facades\Log::alert("get_cart_id:Session");
    }
    return $cart->id;
}
