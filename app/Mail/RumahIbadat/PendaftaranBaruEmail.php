<?php

namespace App\Mail\RumahIbadat;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranBaruEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rumah_ibadat)
    {
        $this->rumah_ibadat = $rumah_ibadat;
        $this->user = User::findorfail($this->rumah_ibadat->user_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $rumah_ibadat = $this->rumah_ibadat;
        $user = $this->user;
        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Pendaftaran Rumah Ibadat Berjaya')
            ->view('email.pendaftaran-rumah-ibadat-berjaya', compact('rumah_ibadat', 'user'));
    }
}
