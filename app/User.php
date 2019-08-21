<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name',
        'email',
        'password',
        'username',
        'last_login_at',
        'last_login_ip',
=======
        'name', 'email', 'password',
>>>>>>> 83a6d5e77d80b4399a83c30329420fa2b104e5be
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD

    public function character()
    {
        return $this->hasOne('App\Character');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'sender_user_id');
    }

=======
>>>>>>> 83a6d5e77d80b4399a83c30329420fa2b104e5be
}
