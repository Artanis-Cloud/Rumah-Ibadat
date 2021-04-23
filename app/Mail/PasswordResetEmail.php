<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->token;
        $user = $this->user;
        // dd($user);
        return $this->from('1083dfd91c-6dee93@inbox.mailtrap.io', 'E-mel Sistem Permohonan Dana Rumah Ibadat')
        ->subject('Tetapan Semula Katalaluan')
        ->view('senarai-email.notifikasiUserResetPassword', compact('token', 'user'));

        // return $this->view('view.name');
    }
}
