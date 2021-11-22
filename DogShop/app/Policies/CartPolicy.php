<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(): bool {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Cart $cart
     * @return bool
     */
    public function view(?User $user, Cart $cart): bool {
        if ($user !== null && $user->id == $cart->user_id) {
            return true;
        }

        if (auth()->getSession()->getId() == $cart->session_id) {
            return true;
        }
        return $user?->can('view-all-carts') ?? false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User|null $user
     * @param Cart $cart
     * @return bool
     */
    public function create(?User $user): bool {
        if ($user !== null){
            $cart = Cart::where('user_id', $user->id)->first();
        } else{
            $cart = Cart::where('session_id', auth()->getSession()->getId())->first();
        }
        if ($cart == null){
            return false;
        }
        return true;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User|null $user
     * @param Cart $cart
     * @return bool
     */
    public function update(?User $user, Cart $cart): bool {
        if ($user !== null && $user->id == $cart->user_id) {
            return true;
        }

        if (auth()->getSession()->getId() == $cart->session_id) {
            return true;
        }

        return $user?->can('edit-all-carts') ?? false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return bool
     */
    public function delete(): bool {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return bool
     */
    public function restore(): bool {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return bool
     */
    public function forceDelete(): bool {
        return false;
    }
}
