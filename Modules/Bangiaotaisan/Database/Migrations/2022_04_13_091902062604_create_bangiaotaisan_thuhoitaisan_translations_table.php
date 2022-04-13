<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangiaotaisanthuhoitaisanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangiaotaisan__thuhoitaisan_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('thuhoitaisan_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['thuhoitaisan_id', 'locale']);
            $table->foreign('thuhoitaisan_id')->references('id')->on('bangiaotaisan__thuhoitaisans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bangiaotaisan__thuhoitaisan_translations', function (Blueprint $table) {
            $table->dropForeign(['thuhoitaisan_id']);
        });
        Schema::dropIfExists('bangiaotaisan__thuhoitaisan_translations');
    }
}
