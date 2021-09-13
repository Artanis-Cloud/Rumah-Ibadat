<?php

namespace App\Mail\PermohonanKhas;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SahkanPermohonanKhas extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan, $yb)
    {
        $this->permohonan = $permohonan;
        $this->user = User::findOrFail($this->permohonan->user_id);
        $this->yb = $yb;
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
        $yb = $this->yb;

        return $this->to($this->yb->email, $this->yb->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Permohonan Khas Baru ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-khas-baru', compact('permohonan', 'user'));
    }
}
