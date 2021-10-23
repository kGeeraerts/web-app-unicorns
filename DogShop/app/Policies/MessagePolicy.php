<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user): bool {
        return $user->can('answer-messages');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function view(User $user, Message $message): bool {
        return $user->can('answer-messages');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User|null $user
     * @return bool
     */
    public function create(?User $user): bool {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function update(User $user, Message $message): bool {
        return $user->can('answer-messages');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function delete(User $user, Message $message): bool {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function restore(User $user, Message $message): bool {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function forceDelete(User $user, Message $message): bool {
        return false;
    }
}
