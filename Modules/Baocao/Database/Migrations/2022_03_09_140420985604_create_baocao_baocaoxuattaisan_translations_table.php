<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaocaoBaocaoxuattaisanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocao__baocaoxuattaisan_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('baocaoxuattaisan_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['baocaoxuattaisan_id', 'locale']);
            $table->foreign('baocaoxuattaisan_id')->references('id')->on('baocao__baocaoxuattaisans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baocao__baocaoxuattaisan_translations', function (Blueprint $table) {
            $table->dropForeign(['baocaoxuattaisan_id']);
        });
        Schema::dropIfExists('baocao__baocaoxuattaisan_translations');
    }
}
