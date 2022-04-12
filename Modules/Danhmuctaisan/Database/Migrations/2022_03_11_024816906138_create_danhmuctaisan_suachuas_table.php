<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanSuachuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suachua', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mataisan');
            $table->string('phanloaitaisan_id');
            $table->string('manhacungcap');
            $table->string('tinhtrang');
            $table->float('chiphisuachua');
            $table->date('ngaysuachua');
            $table->date('ngayketthucsuachua');
            $table->text('motahuhai')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suachua');
    }
}
