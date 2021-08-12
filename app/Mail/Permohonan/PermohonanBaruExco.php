<?php

namespace App\Mail\Permohonan;

use App\Models\RumahIbadat;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanBaruExco extends Mailable
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
        $this->rumah_ibadat = RumahIbadat::findorfail($this->permohonan->rumah_ibadat_id);
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
        $rumah_ibadat = $this->rumah_ibadat;
        $user = $this->user;

        $exco = $this->exco;

        return $this->to($exco->email, $exco->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Permohonan Baru ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-baru-exco', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}
