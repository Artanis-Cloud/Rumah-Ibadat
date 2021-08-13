<?php

namespace App\Mail\RumahIbadat;

use App\Models\User;
use App\Models\RumahIbadat;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanTukarWakilUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan)
    {
        $this->tukar_rumah_ibadat = $permohonan;
        $this->rumah_ibadat = RumahIbadat::findorfail($this->tukar_rumah_ibadat->rumah_ibadat_id);
        $this->user = User::findorfail($this->tukar_rumah_ibadat->user_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $permohonan = $this->tukar_rumah_ibadat;
        $rumah_ibadat = $this->rumah_ibadat;
        $user = $this->user;
        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Permohonan Tukar Wakil Rumah Ibadat Berjaya')
            ->view('email.permohonan-tukar-wakil-rumah-ibadat-berjaya', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}
