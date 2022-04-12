<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaptaisanNhaptaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaptaisan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mataisan', 20);
            $table->string('tentaisan',200);
            $table->string('phanloaitaisan',20);
            $table->string('loaitaisan',200);
            $table->string('sohieutaisan',20);
            $table->string('soserial',20);
            $table->integer('nguyengia');
            $table->float('muckhtbhangnam');
            $table->string('nhacungcap');
            $table->text('ghichu')->nullable();
            $table->string('phongbannhap');
            $table->string('nhanviennhap');
            $table->integer('tongtaisan');
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
        Schema::dropIfExists('nhaptaisan');
    }
}
