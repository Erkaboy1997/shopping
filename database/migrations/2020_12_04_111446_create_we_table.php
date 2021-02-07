<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeTable extends Migration
{
    public function up()
    {
        Schema::create('we', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> string('image',50);
            $table -> string('image_mobile',50);
            $table -> string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we');
    }
}
