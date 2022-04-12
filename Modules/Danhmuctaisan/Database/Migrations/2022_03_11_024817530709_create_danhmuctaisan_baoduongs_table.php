<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanBaoduongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baoduong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mataisan');
            $table->string('phanloaitaisan');
            $table->string('loaibaoduong');
            $table->string('manhacungcap');
            $table->date('ngaybaoduong');
            $table->date('ngayketthucbaoduong');
            $table->string('manhanvienbaoduong');
            $table->text('motahuhai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhmuctaisan__baoduongs');
    }
}
