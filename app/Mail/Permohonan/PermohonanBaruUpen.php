<?php

namespace App\Mail\Permohonan;

use App\Models\RumahIbadat;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanBaruUpen extends Mailable
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
        $this->rumah_ibadat = RumahIbadat::findorfail($this->permohonan->rumah_ibadat_id);
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
        $rumah_ibadat = $this->rumah_ibadat;
        $user = $this->user;

        $upen = $this->upen;

        return $this->to($upen->email, $upen->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Permohonan Baru ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-baru-exco', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}
