<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahIbadat extends Model
{
    use HasFactory;

    protected $fillable = [

        'category',     //(Cina)(India)(Kristian)
        'name',
        'address',
        'postcode',
        'district',
        'state',
        'bank_name',
        'bank_account',
        'office_phone',
        'ros_number',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
