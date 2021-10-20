<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountTerminated extends Mailable implements ShouldQueue {
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public User $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): AccountTerminated {
        return $this->from('no-reply@dogshop.be')->markdown('emails.account-terminated');
    }
}
