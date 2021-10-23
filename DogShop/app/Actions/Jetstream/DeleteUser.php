<?php

namespace App\Actions\Jetstream;

use App\Mail\AccountRemoved;
use Illuminate\Support\Facades\Mail;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers {
    /**
     * Delete the given user.
     *
     * @param mixed $user
     * @return void
     */
    public function delete($user) {
        Mail::to($user->email)->send(new AccountRemoved($user));
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
