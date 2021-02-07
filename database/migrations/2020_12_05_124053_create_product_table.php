<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    public function up(){
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',10);
            $table->string('name',100);
            $table->float('price');
            $table->float('price_discount');
            $table->text('description');
            $table->text('delivery');
            $table->text('character');
            $table->string('recomended')->nullable();
            $table->integer('category_id');
            $table->string('image',40)->nullable();
            $table->string('image1',40)->nullable();
            $table->string('image2',40)->nullable();
            $table->string('image3',40)->nullable();
            $table->string('image4',40)->nullable();
            $table->integer('status')->length(1);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('product');
    }
}
