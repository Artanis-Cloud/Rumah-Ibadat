<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',//user id

        'tokong', //cina
        'kuil_h', //hindu
        'kuil_g', //gurdwara
        'gereja',//kristian
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
