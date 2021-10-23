<?php

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

function all_users_with_answer_messages_permission(){
    $users = User::permission('answer-messages')->get();
    foreach (User::role('owner')->get() as $owner){
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
    $dogArray = ['Havanese','Golden Retriever' ,'German Shepherd Dog' ,'Jack Russel' ,'Border Collie','Husky','Maltese','Corgi','Beagle','Chow Chow'];
    $rand_keys = array_rand($dogArray,1);
    return $dogArray[$rand_keys];
}

function get_cart_id(){
    if (auth()->user()) {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);
    } else {
        $cart = Cart::firstOrCreate([
            'session_id' => auth()->getSession()->getId(),
        ]);
    }
    return $cart->id;
}
