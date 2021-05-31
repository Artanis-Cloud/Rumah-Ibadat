<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $fillable = [

        'permohonan_id',    //permohonan id

        'tujuan',           //(1-Pendidikan Keagamaan)
                            //(2-Aktiviti Keagamaan)
                            //(3-Pembelian Peralatan Untuk Kelas Keagamaan)
                            //(4-Baik Pulih/Penyelenggaraan Bangunan)
                            //(5-Pemindahan/Pembinaan Baru Rumah Ibadat)
        'status',
    ];

    public function permohonan()
    {
        return $this->belongsTo('\App\Models\Permohonan', 'permohonan_id');
    }

    public function lampiran()
    {
        return $this->hasMany('App\Models\Lampiran');
    }
}
