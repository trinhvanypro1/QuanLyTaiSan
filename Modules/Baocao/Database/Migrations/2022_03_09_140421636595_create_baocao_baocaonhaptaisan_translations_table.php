<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaocaoBaocaonhaptaisanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocao__baocaonhaptaisan_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('baocaonhaptaisan_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['baocaonhaptaisan_id', 'locale']);
            $table->foreign('baocaonhaptaisan_id')->references('id')->on('baocao__baocaonhaptaisans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baocao__baocaonhaptaisan_translations', function (Blueprint $table) {
            $table->dropForeign(['baocaonhaptaisan_id']);
        });
        Schema::dropIfExists('baocao__baocaonhaptaisan_translations');
    }
}
