<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTk extends Model
{
    protected $table='loai_tks';
    protected $fillable=[
    	'idQuyen','name','note',
    ];
    public function phanQuyen(){
    	return $this->belongsTo('App\Models\PhanQuyen','idQuyen','id');
    }
    public function user(){
        return $this->hasMany('App\Models\User','idLoaiTk','id');
    }
}
