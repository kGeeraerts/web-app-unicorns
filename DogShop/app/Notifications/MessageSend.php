<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSend extends Notification implements ShouldQueue {
    use Queueable;

    public Message $message;

    /**
     * Create a new notification instance.
     * @param Message $message
     */
    public function __construct(Message $message) {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->from('no-reply@dogshop.be')
            ->subject('A new message has been sent to DogShop')
            ->markdown('emails.message-send', [
                'message'=>$this->message
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            'message_id' => $this->message->id,
            'name' => $this->message->name,
            'subject' => $this->message->subject,
        ];
    }
}
