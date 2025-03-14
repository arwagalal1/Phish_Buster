<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyCodeNotification extends Notification
{
    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Verification Code')
                    ->line('Your verification code is: ' . $this->code)
                    ->line('This code will expire in 10 minutes.')
                    ->line('If you did not request a password reset, no further action is required.');
    }
}