<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lienhe extends Model
{
    protected $table = 'lienhes';
    protected $guarded = [];
       public function users()
    {
        return $this->belongsTo(User::class);
    }
}
