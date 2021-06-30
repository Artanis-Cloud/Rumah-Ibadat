<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'allow_permohonan', // enable and disable new permohonan
        'allowed_user_id',  //user record for enabling or disabling the permohonan

        'tokong_counter',   //tokong counter - if more than 10 add 1 to batch
        'tokong',           //tokong batch

        'kuil_counter',     //kuil counter - if more than 10 add 1 to batch
        'kuil',             //kuil batch

        'gurdwara_counter', //gurdwara counter - if more than 10 add 1 to batch
        'gurdwara',         //gurdwara batch

        'gereja_counter',   //gereja counter - if more than 10 add 1 to batch
        'gereja',           //gereja batch

    ];
}
