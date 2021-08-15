<?php

namespace App\Notifications\RumahIbadat;

use App\Mail\RumahIbadat\PermohonanTukarWakilUserMail;
use App\Mail\RumahIbadat\PermohonanTukarWakilUpenMail;

use App\Models\User;

use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PermohonanTukarWakil extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($permohonan)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($permohonan)
    {
        //sent mail to user
        Mail::send(new PermohonanTukarWakilUserMail($permohonan)); 

        //sent mail to all UPEN user
        $user = User::where('role', '3')->get();

        foreach($user as $upen){
            Mail::send(new PermohonanTukarWakilUpenMail($permohonan, $upen)); 
        }
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
