<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Csm extends Model implements Auditable
{
    use HasFactory;
    use Notifiable;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'intro_title',
        'intro_content',
        'address',
        'email',
        'contact',
    ];
}
