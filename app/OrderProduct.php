<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $guarded = [];
    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }

    public function order(){
    	return $this->belongsTo('App\Order','id_order','id');
    }
}
