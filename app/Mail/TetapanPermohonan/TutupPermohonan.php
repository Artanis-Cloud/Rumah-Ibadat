<?php

namespace App\Mail\TetapanPermohonan;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutupPermohonan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($current_user)
    {
        $this->user = $current_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Permohonan Dana Rumah Ibadat Ditutup')
            ->view('email.permohonan-tutup');
    }
}
