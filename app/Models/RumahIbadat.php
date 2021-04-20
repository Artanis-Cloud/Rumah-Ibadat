<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahIbadat extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',          //user id
        'verified',         //(1 = Verified) (0 = Not Verified)

        'category',         //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))
        'name',
        'registration_type',
        'registration_number',
        'address',
        'postcode',
        'district',
        'state',            //All rumah ibadat in Selangor
        'bank_name',
        'bank_account',
        'office_phone',
    ];

    //front code id
    public function getRumahIbadatID()
    {
        return sprintf('RMH-%06d', $this->id);
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function permohonan()
    {
        return $this->hasMany('App\Models\Permohonan');
    }
}
