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


    public function animal()
    {
        return $this->hasOne('App\Animal')->withDefault(); // возвращается пустая модель если нет связи
    }

    public function article()
    {
        return $this->hasMany('App\Article');
    }

    public function roles()
    {
        return $this->belongToMany('App\Role');
    }
}
