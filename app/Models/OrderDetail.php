<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_details';
    protected $fillable=[
    	'idOrder','idXeDaThue','price','hinhthuc',
    ];
    public function order(){
    	return $this->belongsTo('App\Models\Order','idOrder','id');
    }
    public function xeDaThue(){
    	return $this->belongsTo('App\Models\XeDaThue','idXeDaThue','id');
    }
}
