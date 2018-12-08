<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegisteredNotification extends Notification {

    public function __construct($user) {
        $this->user = $user;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
                    ->subject('New User Registration')
                    ->view('mails.register_email', [
                        'name' => $this->user->name,
                        'email' => $this->user->email
                    ]);
    }

}