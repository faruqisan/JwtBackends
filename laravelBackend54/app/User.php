<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_role(){
      return $this->hasOne('App\UserRole');
    }

    public function customJWTClaims()
    {
        return [
          'name'  => $this->name,
          'username' => $this->username,
          'role' => $this->user_role->role->name,
          'timestamp' => Carbon::now()->toDateTimeString(),
        ];
    }
}
