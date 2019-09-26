<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='cities';
    protected $fillable=[
    	'idLoaiMenu','name','slug','quantity',
    ];
    public function loaiMenu(){
    	return $this->belongsTo('App\Models\LoaiMenus','idLoaiMenu','id');
    }
    public function city(){
    	return $this->hasMany('App\Models\LoaiXe','idCity','id');
    }
}
