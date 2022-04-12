<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucnhanviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhmucnhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('manhanvien')->unique();
            $table->string('tennhanvien');
            $table->string('hinhanh');
            $table->string('gioitinh');
            $table->date('ngaysinh');
            $table->string('cmnd')->unique();
            $table->string('tongiao');
            $table->string('dantoc');
            $table->string('sonha');
            $table->integer('xaphuong');
            $table->integer('quanhuyen');
            $table->integer('tinhtp');
            $table->string('chuyenmon');
            $table->string('trinhdo');
            $table->string('vanban_chungchi');
            $table->integer('phongban_id');
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
        Schema::dropIfExists('danhmucnhanvien');
    }
}
