<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuhoitaisanThuhoitaisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuhoitaisan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mathuhoi');
            $table->date('ngaythuhoi');
            $table->integer('nhanvienthuhoi_id');
            $table->integer('bophanbithuhoi_id');
            $table->integer('nhanvienbithuhoi_id');
            $table->integer('taisan_id');
            $table->integer('soluong');
            $table->string('tinhtrang');
            $table->string('lydothuhoi')->nullable();
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
        Schema::dropIfExists('thuhoitaisan');
    }
}
