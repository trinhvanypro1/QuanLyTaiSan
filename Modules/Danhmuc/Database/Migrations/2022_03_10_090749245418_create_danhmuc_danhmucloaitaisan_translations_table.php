<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucloaitaisanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuc__danhmucloaitaisan_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('danhmucloaitaisan_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['danhmucloaitaisan_id', 'locale']);
        //     $table->foreign('danhmucloaitaisan_id')->references('id')->on('danhmuc__danhmucloaitaisans')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuc__danhmucloaitaisan_translations', function (Blueprint $table) {
        //     $table->dropForeign(['danhmucloaitaisan_id']);
        // });
        // Schema::dropIfExists('danhmuc__danhmucloaitaisan_translations');
    }
}
