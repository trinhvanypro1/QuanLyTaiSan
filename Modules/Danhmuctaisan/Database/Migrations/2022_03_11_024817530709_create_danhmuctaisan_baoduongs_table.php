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
            $table->integer('taisan_id');
            $table->string('loaibaoduong');
            $table->integer('nhanvienbaoduong_id');
            $table->integer('nhacungcap_id');
            $table->date('ngaybaoduong');
            $table->date('ngayketthucbaoduong');
            $table->text('motahuhai');
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
        Schema::dropIfExists('baoduong');
    }
}
