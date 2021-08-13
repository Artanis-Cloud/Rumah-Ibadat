<?php

namespace App\Mail\Pendaftaran;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DaftarPenggunaEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Pendaftaran Berjaya ')
            ->view('email.pendaftaran-berjaya', compact('user'));
    }
}
