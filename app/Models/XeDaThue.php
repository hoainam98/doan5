<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XeDaThue extends Model
{
    protected $table='xe_da_thues';
    protected $fillable=[
    	'idXe','idUser','startday','endday','note','hinhthuc','status',
    ];
    public function orderDetail(){
        return $this->hasMany('App\Models\OrderDetail','idXeDaThue','id');
    }
    public function xe(){
    	return $this->belongsTo('App\Models\Xe','idXe','id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User','idUser','id');
    }
}
