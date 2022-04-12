<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanBaoduongTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuctaisan__baoduong_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('baoduong_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['baoduong_id', 'locale']);
        //     $table->foreign('baoduong_id')->references('id')->on('danhmuctaisan__baoduongs')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuctaisan__baoduong_translations', function (Blueprint $table) {
        //     $table->dropForeign(['baoduong_id']);
        // });
        // Schema::dropIfExists('danhmuctaisan__baoduong_translations');
    }
}
