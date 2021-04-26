<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function order_product(){
    	return $this->hasMany('App\OrderProduct','id_order','id');
    }
}
