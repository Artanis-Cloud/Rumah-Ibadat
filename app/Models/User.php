<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',             //(0 - User)(1 - Exco)(2 - YB)(3 - UPEN)(4 - Admin)
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

    public function user_role()
    {
        return $this->hasOne('App\Models\UserRole');
    }

    public function special_application()
    {
        return $this->hasMany('App\Models\SpecialApplication');
    }

    //forget password email custom
    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new PasswordReset($token, $this->ic_number));
    }
}
