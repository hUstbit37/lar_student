<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Khi dùng bảng mới để login, thì phải ghi đè bảng và thay đổi fillable cho chuẩn
    // protected $table ='member';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_users');
    }

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
}
