<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    protected $table='phan_quyens';
    protected $fillable=[
    	'name','description',
    ];
    public function loaiTk(){
    	return $this->hasMany('App\Models\LoaiTk','idQuyen','id');
    }
}
