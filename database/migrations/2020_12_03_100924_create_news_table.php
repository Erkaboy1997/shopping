<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table){
            $table->bigIncrements('id');
            $table -> string('name')->nullable();
            $table -> string('day',30)->nullable();
            $table -> string('source')->nullable();
            $table -> string('image',100)->nullable();
            $table -> string('description')->nullable();
            $table -> string('description_long')->nullable();
            $table -> integer('type')->nullable();
            $table -> integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
