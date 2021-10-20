<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageAnswer extends Mailable implements ShouldQueue {
    use Queueable, SerializesModels;

    public Message $message;

    /**
     * Create a new message instance.
     *
     * @param Message $message
     */
    public function __construct(Message $message) {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): MessageAnswer {
        return $this->subject('RE: ' . $this->message->subject)->markdown('emails.message-answer');
    }
}
