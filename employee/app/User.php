<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    // Khai báo bảng ko sử dụnng 2 trường Created_at và Update_at 
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $timestamps = false;
    protected $fillable = [
        'id', 'username', 'email', 'role', 'password',
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
        //'loginfirst' => 'datetime',
    ]; 
}
