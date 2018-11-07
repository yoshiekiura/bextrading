<?php

namespace Tradesys\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
         * The password reset token.
         *
         * @var string
         */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Request New Password')
        ->greeting('Dear '.$notifiable->name)
        ->line('you received this email because you want to re establish a new password for this account.')
        ->action('Re-Establish password', url(config('app.url').route('password.reset', $this->token, false)))
        ->line('If you did not request this. Please forget about it, nothing has changed.')
        ->salutation('Cheers');
    }
}
