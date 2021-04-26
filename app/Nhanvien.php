<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    protected $table = 'nhanviens';
    protected $guarded = [
    	   'fullname', 'phone', 'age', 'cmnd','address', 'Image','user_id'
    ];
      public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}
