<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
