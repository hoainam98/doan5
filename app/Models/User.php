<?php

namespace App\Models;

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
        'idLoaiTk','name', 'email', 'password','status','CMT','phone','address','sex',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table='users';
    public function order(){
        return $this->hasMany('App\Models\Order','idUser','id');
    }
    public function xeDaThue(){
        return $this->hasMany('App\Models\XeDaThue','idUser','id');
    }
    public function xe(){
        return $this->hasMany('App\Models\Xe','idUser','id');
    }
    public function loaiTk(){
        return $this->belongsTo('App\Models\LoaiTk','idLoaiTk','id');
    }
}
