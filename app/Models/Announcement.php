<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Announcement extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'user_id',                  //user id

        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)

        //role
        'admin',
        'upen',
        'yb',
        'exco',
        'pemohon',


        'title',
        'content',

    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
