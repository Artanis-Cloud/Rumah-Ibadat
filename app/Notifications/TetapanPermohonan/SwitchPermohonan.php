<?php

namespace App\Notifications\TetapanPermohonan;

use App\Models\User;
use App\Models\Batch;

use App\Mail\TetapanPermohonan\BukaPermohonan;
use App\Mail\TetapanPermohonan\TutupPermohonan;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\Mail;

class SwitchPermohonan extends Notification
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
    public function toMail($batch)
    {
        $user = User::where('role', '!=', '4')->get();

        // $user = User::where('role', '4')->get(); //testing phase
        
        if($batch->allow_permohonan == '0'){ //tutup permohonan
            foreach($user as $current_user){
                Mail::send(new TutupPermohonan($current_user));
            }
        }elseif($batch->allow_permohonan == '1') { //buka permohonan
            foreach ($user as $current_user) {
                Mail::send(new BukaPermohonan($current_user));
            }
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
