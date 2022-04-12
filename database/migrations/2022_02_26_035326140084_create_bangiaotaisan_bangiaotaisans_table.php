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
            $table->string('loai_ban_giao');
            $table->text('ly_do_ban_giao')->nullable();
            $table->string('bo_phan_ban_giao');
            $table->string('bo_phan_nhan_ban_giao');
            $table->string('nhan_vien_ban_giao');
            $table->string('nhan_vien_nhan_ban_giao');
            $table->string('ma_tai_san');
            $table->string('ten_tai_san');
            $table->integer('so_luong')->nullable();
            $table->string('tinh_trang');
            $table->String('nguoi_su_dung');
            $table->string('in_tem');
            $table->string('phieu_in');
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
