<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmuctaisanNhaptaisanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuctaisan__nhaptaisan_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('nhaptaisan_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['nhaptaisan_id', 'locale']);
        //     $table->foreign('nhaptaisan_id')->references('id')->on('danhmuctaisan__nhaptaisans')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuctaisan__nhaptaisan_translations', function (Blueprint $table) {
        //     $table->dropForeign(['nhaptaisan_id']);
        // });
        // Schema::dropIfExists('danhmuctaisan__nhaptaisan_translations');
    }
}
