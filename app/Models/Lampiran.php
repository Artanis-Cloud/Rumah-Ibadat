<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Lampiran extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'tujuan_id',            //tujuan id
        'file_type',            //(pdf) (png) (jpg) (jpeg)
        'url',                  //attachment
        'description',
    ];

    public function tujuan()
    {
        return $this->belongsTo('\App\Models\Tujuan', 'tujuan_id');
    }
}
