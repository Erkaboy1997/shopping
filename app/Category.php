<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'category';

    public function category(){
        return $this->belongsToMany(Category::class,'id');
    }
}
