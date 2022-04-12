<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangiaotaisanBangiaotaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangiaotaisan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('ma_ban_giao');
            $table->string('hop_dong_ban_giao');
            $table->string('loai_ban_giao');
            $table->integer('nhanvienbangiao_id');
            $table->integer('phongbannhantaisan_id');
            $table->integer('nhanviennhantaisan_id');
            $table->integer('taisan_id');
            $table->integer('so_luong_ban_giao');
            $table->string('tinh_trang');
            $table->date('ngay_ban_giao');
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
        Schema::dropIfExists('bangiaotaisan');
    }
}
