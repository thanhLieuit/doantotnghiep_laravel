<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    public function loaiproduct()
    {
        return $this->belongsTo(LoaiProduct::class);
    }
    public function order_product(){
    	return $this->hasMany(OrderProduct::class,'id_product','id');
    }
    public function comment()
    {
    	return $this->belonogsto(Comment::class);
    }
    public function users() {
        return $this->hasOne(User::class);
    }
     public function kho()
    {
        return $this->belongsto(Kho::class);
    }
}
