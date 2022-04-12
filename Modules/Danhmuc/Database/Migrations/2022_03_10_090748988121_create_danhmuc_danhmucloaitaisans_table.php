<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucloaitaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('danhmucloaitaisan', function (Blueprint $table) {
             $table->engine = 'InnoDB';
             $table->increments('id');
             $table->string('maloaitaisan')->unique();
             $table->string('loaitaisan');
             $table->text('mota')->nullable();
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
        Schema::dropIfExists('danhmucloaitaisan');
    }
}
