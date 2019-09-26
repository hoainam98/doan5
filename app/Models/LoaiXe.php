<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiXe extends Model
{
    protected $table='loai_xes';
    protected $fillable=[
    	'idCity','idLoaiMenu','name','slug','quantity','description',
    ];
    public function city(){
    	return $this->belongsTo('App\Models\City','idCity','id');
    }
    public function loaiMenu(){
    	return $this->belongsTo('App\Models\LoaiMenu','idLoaiMenu','id');
    }
    public function xe(){
        return $this->hasMany('App\Models\Xe','idLoaiXe','id');
    }
}
