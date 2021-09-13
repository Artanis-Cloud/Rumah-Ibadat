<?php

namespace App\Notifications\Permohonan;

use App\Models\User;
use App\Mail\Permohonan\PermohonanCreatedEmail;
use App\Mail\Permohonan\PermohonanBaruExco;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\Mail;

class PermohonanCreated extends Notification
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
        Mail::send(new PermohonanCreatedEmail($permohonan));

        if($permohonan->rumah_ibadat->category == "TOKONG"){
            $user = User::whereHas('user_role', function ($q) {
                $q->where('tokong', '1');
            })->where('role', '1')->where('status', '1')->get();
        }elseif($permohonan->rumah_ibadat->category == "KUIL"){
            $user = User::whereHas('user_role', function ($q) {
                $q->where('kuil', '1');
            })->where('role', '1')->where('status', '1')->get();
        } elseif ($permohonan->rumah_ibadat->category == "GURDWARA") {
            $user = User::whereHas('user_role', function ($q) {
                $q->where('gurdwara', '1');
            })->where('role', '1')->where('status', '1')->get();
        } elseif ($permohonan->rumah_ibadat->category == "GEREJA") {
            $user = User::whereHas('user_role', function ($q) {
                $q->where('gereja', '1');
            })->where('role', '1')->where('status', '1')->get();
        }


        foreach($user as $exco){
             Mail::send(new PermohonanBaruExco($permohonan, $exco));
        }

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($permohonan)
    {
        return [
            //
        ];
    }
}
