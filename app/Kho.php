<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Kho extends Model
{
	protected $table = 'kho';
    protected $guarded = [];
     public function product()
    {
        return $this->hasMany('App\Produdct');
    }
}
