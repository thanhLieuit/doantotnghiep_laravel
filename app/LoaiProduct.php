<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiProduct extends Model
{
    protected $table = 'loaiproducts';
    protected $guarded = [];
    public function product()
    {
        return $this->hasMany(Product::class,'id_loai','id');
    }
    public function menuchas()
    {
        return $this->belongsTo(Menucha::class);
    }
}
