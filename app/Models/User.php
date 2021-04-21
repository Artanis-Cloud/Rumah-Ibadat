<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',             //(0 = Super Admin) (1 = Admin) (2 = User)
        'status',           //(1 = Active) (0 = Deactive)
        'is_firstime',      //(1 = Firstimer) (0 = Not Firstimer)
        'is_rumah_ibadat',  //(1 = Exist) (0 = Not Exist) (2 = Processing for tukar wakil)

        'name',
        'email',
        'ic_number',
        'mobile_phone',
        'password',
        
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Table Relation

    public function rumah_ibadat()
    {
        return $this->hasOne('App\Models\RumahIbadat');
    }
}
