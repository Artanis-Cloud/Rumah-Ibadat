<?php

namespace App\Mail\Pengguna;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PenggunaBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_user, $temp_password)
    {
        $this->user = $new_user;
        $this->password = $temp_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $password = $this->password;
        return $this->to($user->email, $user->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Pendaftaran Pengguna Baru')
            ->view('email.pendaftaran-dalaman-berjaya', compact('user', 'password'));
    }
}
