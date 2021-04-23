<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Mail\PasswordResetEmail as Mailable;


class PasswordReset extends Notification
{
    use Queueable;

    protected $token;
    protected $email;
    protected $ic_number;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $ic_number)
    {
        $this->token = $token;
        $this->ic_number = $ic_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $token = $this->token;
        $user = $notifiable;

        // DEFAULT EMAIL TEMPLATE
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        // CUSTOM EMAIL TEMPLATE
        return (new Mailable($user, $token))->to($user->email, $user->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
