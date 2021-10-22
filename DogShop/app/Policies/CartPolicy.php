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
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function view(?User $user, Cart $cart): bool {
        if ($user->id == $cart->user_id) {
            return true;
        }

        if (auth()->getSession()->getId() == $cart->session_id){
            return true;
        }

        return $user->can('view-all-carts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function update(User $user, Cart $cart): bool {
        if ($user->id == $cart->user_id) {
            return true;
        }

        return $user->can('edit-all-carts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function delete(User $user, Cart $cart): bool {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function restore(User $user, Cart $cart): bool {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function forceDelete(User $user, Cart $cart): bool {
        return false;
    }
}
