<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=[
    	'code_order','idUser','total','status','message',
    ];
    public function user(){
    	return $this->belongsTo('App\Models\User','idUser','id');
    }
    public function orderDetail(){
        return $this->hasMany('App\Models\OrderDetail','idOrder','id');
    }
}
