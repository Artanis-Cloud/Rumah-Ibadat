<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TukarRumahIbadat extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',                  //user id

        'reference_number',
        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)

        'category',                 //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))
        'rumah_ibadat_id',

        'category',
        'rumah_ibadat_id',
    ];

    public function getPermohonanID()
    {
        return sprintf('X-%06d', $this->reference_number);
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

}
