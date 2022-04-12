<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaocaoBaocaokhacTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocao__baocaokhac_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('baocaokhac_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['baocaokhac_id', 'locale']);
            $table->foreign('baocaokhac_id')->references('id')->on('baocao__baocaokhacs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baocao__baocaokhac_translations', function (Blueprint $table) {
            $table->dropForeign(['baocaokhac_id']);
        });
        Schema::dropIfExists('baocao__baocaokhac_translations');
    }
}
