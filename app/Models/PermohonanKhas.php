<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanKhas extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',                  //user id

        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
        'category',                 //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))

        'purpose',                  
        'supported_document_1',     //attachment
        'supported_document_2',     //attachment
        'requested_amount',         //money
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
