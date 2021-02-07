<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBannerTable extends Migration
{
    public function up()
    {
        Schema::create('product_banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> string('image_left') -> nullable();
            $table -> integer('product_id');
            $table -> string('title');
            $table -> integer('product2_id');
            $table -> string('image_right');
            $table -> integer('status') -> length(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_banner');
    }
}
