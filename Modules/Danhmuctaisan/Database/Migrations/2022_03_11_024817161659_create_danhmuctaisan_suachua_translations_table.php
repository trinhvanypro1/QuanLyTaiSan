<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanSuachuaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuctaisan__suachua_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('suachua_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['suachua_id', 'locale']);
        //     $table->foreign('suachua_id')->references('id')->on('danhmuctaisan__suachuas')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuctaisan__suachua_translations', function (Blueprint $table) {
        //     $table->dropForeign(['suachua_id']);
        // });
        // Schema::dropIfExists('danhmuctaisan__suachua_translations');
    }
}
