<?php

namespace App\Mail\PermohonanKhas;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TidakLulusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan, $upen)
    {
        $this->permohonan = $permohonan;
        $this->user = User::findOrFail($this->permohonan->user_id);
        $this->upen = $upen;
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
        $upen = $this->upen;

        return $this->to($this->upen->email, $this->upen->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Permohonan Khas Tidak Diluluskan ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-khas-lulus', compact('permohonan', 'user'));
    }
}
