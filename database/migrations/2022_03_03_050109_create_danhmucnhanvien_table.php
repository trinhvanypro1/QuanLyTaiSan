<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucnhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhmucnhanvien', function (Blueprint $table) {
            $table->primary('manhanvien');
            $table->string('tennhanvien');
            $table->text('diachi')->nullable();
            $table->string('chucvu');
            $table->string('quanlydulieu');
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
