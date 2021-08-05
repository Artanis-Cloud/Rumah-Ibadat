<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryApplication extends Model
{
    use HasFactory;

    protected $fillable = [

        'tahun',
        'rumah_ibadat',
        'alamat',
        'daerah',
        'no_pendaftaran',
        'sebab_permohonan',
        'no_akaun',
        'bank',
        'jumlah_kelulusan',                

    ];
}
