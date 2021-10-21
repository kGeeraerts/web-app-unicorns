<?php

namespace App\Policies;

use App\Models\Dog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DogPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user): bool {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Dog $dog
     * @return bool
     */
    public function view(?User $user, Dog $dog): bool {
        if ($dog->available) {
            return true;
        }

        if ($user->can('view-unavailable-dogs')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool {
        return ($user->can('add-dog'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Dog $dog
     * @return mixed
     */
    public function update(User $user, Dog $dog): bool {
        return ($user->can('edit-any-dog'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Dog $dog
     * @return bool
     */
    public function delete(User $user, Dog $dog): bool {
        return ($user->can('remove-any-dog'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Dog $dog
     * @return bool
     */
    public function restore(User $user, Dog $dog): bool {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Dog $dog
     * @return bool
     */
    public function forceDelete(User $user, Dog $dog): bool {
        return false;
    }
}
