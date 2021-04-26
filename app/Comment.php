<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];
    public function product()
    {
        return $this->hasMany(Product::class,'id_product','id');
    }
    
}
