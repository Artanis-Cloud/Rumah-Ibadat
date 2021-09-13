<?php

namespace App\Mail\PermohonanKhas;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan, $exco)
    {
        $this->permohonan = $permohonan;
        $this->user = User::findOrFail($this->permohonan->user_id);
        $this->exco = $exco;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $permohonan = $this->permohonan;
        $user = $this->user;
        $exco = $this->exco;

        return $this->to($this->exco->email, $this->exco->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Permohonan Khas Baru ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-khas-baru', compact('permohonan', 'user'));
    }
}
