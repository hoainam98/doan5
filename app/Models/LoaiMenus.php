<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiMenus extends Model
{
    protected $table='loai_menus';
    protected $fillable=[
    	'name','note',
    ];
    public function city(){
    	return $this->hasMany('App\Models\City','idLoaiMenu','id');
    }
    public function menu(){
    	return $this->hasMany('App\Models\Menu','idLoaiMenu','id');
    }
}
