<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;


class Batch extends Model implements Auditable
{
    use HasFactory;
    use Notifiable;

    use \OwenIt\Auditing\Auditable;


    protected $fillable = [
        'allow_permohonan', // enable and disable new permohonan
        'allowed_user_id',  //user record for enabling or disabling the permohonan

        'main_batch',       //main batch

        'tokong_counter',   //tokong counter - if more than 10 add 1 to main batch
        'tokong',           //tokong batch

        'kuil_counter',     //kuil counter - if more than 10 add 1 to main batch
        'kuil',             //kuil batch

        'gurdwara_counter', //gurdwara counter - if more than 10 add 1 to main batch
        'gurdwara',         //gurdwara batch

        'gereja_counter',   //gereja counter - if more than 10 add 1 to main batch
        'gereja',           //gereja batch

    ];
}
