<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [

        'rumah_ibadat_id',          //rumah ibadat id
        'user_id',                  //user id

        //remarks permohonan
        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
        'batch',                    //1 Batch can have 10 permohonan & batch start after...

        //before permohonan
        'application_letter',               //attachment
        'registration_certificate',         //attachment
        'account_statement',                //attachment

        'spending_statement',               //attachment
        'support_letter',                   //attachment
        'committee_member',                 //attachment
        'certificate_or_letter_temple',     //attachment
        'invitation_letter',                //attachment

        'payment_method',                   //(1-Check)(2-EFT)

    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function rumah_ibadat()
    {
        return $this->belongsTo('\App\Models\RumahIbadat', 'rumah_ibadat_id');
    }

    public function tujuan()
    {
        return $this->hasMany('App\Models\Tujuan');
    }
}
