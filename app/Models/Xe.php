<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    protected $table='xes';
    protected $fillable=[
    	'idUser','idLoaiXe','dacdiem','description','tinhnang','luuy','price','gioihankm','sale','status','danhgia',
    ];
    public function xeDaThue(){
    	return $this->hasMany('App\Models\XeDaThue','idXe','id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User','idUser','id');
    }
    public function loaiXe(){
    	return $this->belongsTo('App\Models\LoaiXe','idLoaiXe','id');
    }

}
