<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class SoalanLazim extends Model implements Auditable
{
    use HasFactory;
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [

        'soalan',
        'jawapan',
        'status',

    ];
}
