<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucphongbanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuc__danhmucphongban_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('danhmucphongban_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['danhmucphongban_id', 'locale']);
        //     $table->foreign('danhmucphongban_id')->references('id')->on('danhmuc__danhmucphongbans')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuc__danhmucphongban_translations', function (Blueprint $table) {
        //     $table->dropForeign(['danhmucphongban_id']);
        // });
        // Schema::dropIfExists('danhmuc__danhmucphongban_translations');
    }
}
