<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $guarded = [];
    public function order()
    {
        return $this->hasMany(Order::class,'id_c','id');
    }
}
