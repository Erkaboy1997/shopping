<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = 'product';

    public function colors(){
        return $this->belongsToMany('App\Color');
    }

    public function sizes(){
        return $this->belongsToMany('App\Size');
    }

    public function seasons(){
        return $this->belongsToMany('App\Season');
    }

    public function hasAnyColor($color){
        return null !== $this -> colors()->where('name',$color) -> first();
    }

    public function hasAnySize($size){
        return null !== $this -> sizes()->where('name',$size) -> first();
    }

    public function hasAnySeason($season){
        return null !== $this -> seasons()->where('name',$season) -> first();
    }
}
