<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';
    protected $fillable=[
    	'idLoaiMenu','name','slug','note','status',
    ];
    public function loaiMenu(){
    	return $this->belongsTo('App\Models\LoaiMenus','idLoaiMenu','id');
    }
}
