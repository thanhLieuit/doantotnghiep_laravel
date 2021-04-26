<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menucha extends Model
{
    protected $table = 'menuchas';
    protected $guarded = [];
    public function loaiproduct()
    {
        return $this->hasMany(LoaiProduct::class,'id_menu','id');
    }
}
