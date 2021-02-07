<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
