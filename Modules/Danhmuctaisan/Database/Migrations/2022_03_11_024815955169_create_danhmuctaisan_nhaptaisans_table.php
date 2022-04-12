<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanNhaptaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taisan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mataisan');
            $table->string('tentaisan');
            $table->integer('soluong');
            $table->string('soserial')->unique();
            $table->string('donvi');
            $table->string('phanloaitaisan');
            $table->integer('loaitaisan_id');
            $table->integer('muckhtbhangnam');
            $table->integer('nhacungcap_id');
            $table->date('ngaysudung');
            $table->integer('baohanh');
            $table->integer('hangton')->nullable();
            $table->text('mota')->nullable();
            $table->integer('tongtaisan');
            $table->string('hinhanh');
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
        Schema::dropIfExists('taisan');
    }
}
