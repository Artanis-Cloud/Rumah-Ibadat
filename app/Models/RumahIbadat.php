<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahIbadat extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',                  //user id
        'verified',                 //(1 = Verified) (0 = Not Verified)

        'category',                 //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu))(Kuil (Gurdwara))
        'name_association',
        'office_phone',
        'name_association_bank',
        'registration_type',        //(MEMPUNYAI PENDAFTARAN SENDIRI)(MEMPUNYAI PENDAFTARAN DI BAWAH PERSATUAN INDUK/CAWANGAN)
        'name_association_main',
        'registration_number',
        'address',
        'postcode',
        'district',
        'state',                    //All rumah ibadat in Selangor
        'pbt_area',
        'bank_name',
        'bank_account',
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
