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

        'upen_address',
        'upen_email',
        'upen_contact',

        'yb1_name',
        'yb1_address',
        'yb1_email',
        'yb1_contact',

        'yb2_name',
        'yb2_address',
        'yb2_email',
        'yb2_contact',

        'yb3_name',
        'yb3_address',
        'yb3_email',
        'yb3_contact',

        'yb4_name',
        'yb4_address',
        'yb4_email',
        'yb4_contact',
    ];
}
