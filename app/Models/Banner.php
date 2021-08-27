<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Banner extends Model
{
    use HasFactory;
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name_file',
        'comment',
        'url',
        'status',
    ];

}
