<?php

namespace App\Mail\RumahIbadat;

use App\Models\User;
use App\Models\RumahIbadat;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TukarWakilGagalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
        $this->rumah_ibadat = RumahIbadat::findorfail($permohonan->rumah_ibadat_id);
        $this->user = User::findorfail($permohonan->user_id);
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
        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
            ->subject('Penukaran Wakil Rumah Ibadat Tidak Berjaya')
            ->view('email.tukar-wakil-rumah-ibadat-gagal', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}
