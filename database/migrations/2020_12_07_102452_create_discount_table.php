<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    public function up(){
        Schema::create('discount', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> string('title') -> nullable();
            $table -> text('description') -> nullable();
            $table -> string('name') -> nullable();
            $table -> string('info') -> nullable();
            $table -> string('image');
            $table -> integer('type') -> length(1);
            $table -> string('lifetime') -> nullable();
            $table -> string('button') -> nullable();
            $table -> integer('status') -> length(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount');
    }
}
