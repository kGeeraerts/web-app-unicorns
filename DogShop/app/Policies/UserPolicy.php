<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool {
        return $user->hasRole(['vendor','admin', 'owner']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @return bool
     */
    public function view(?User $user): bool {
        return true;
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
     * @return bool
     */
    public function update(User $user): bool {
        return $user->hasRole(['admin', 'owner']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool {
        return $user->hasRole(['admin', 'owner']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @return bool
     */
    public function restore(User $user): bool {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @return bool
     */
    public function forceDelete(User $user): bool {
        return false;
    }
}
