<?php

namespace App\Mail\Permohonan;

use App\Models\RumahIbadat;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmitSemakSemulaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan, $reviewer_user)
    {
        $this->permohonan = $permohonan;
        $this->rumah_ibadat = RumahIbadat::findorfail($this->permohonan->rumah_ibadat_id);
        $this->user = User::findOrFail($this->permohonan->user_id);

        $this->reviewer_user = $reviewer_user;
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

        $reviewer_user = $this->reviewer_user;

        return $this->to($reviewer_user->email, $reviewer_user->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Semakan Semula Permohonan ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-submit-semak-semula', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}
