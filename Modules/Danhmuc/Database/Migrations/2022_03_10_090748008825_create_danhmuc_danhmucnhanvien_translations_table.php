<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucnhanvienTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuc__danhmucnhanvien_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('danhmucnhanvien_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['danhmucnhanvien_id', 'locale']);
        //     $table->foreign('danhmucnhanvien_id')->references('id')->on('danhmuc__danhmucnhanviens')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuc__danhmucnhanvien_translations', function (Blueprint $table) {
        //     $table->dropForeign(['danhmucnhanvien_id']);
        // });
        // Schema::dropIfExists('danhmuc__danhmucnhanvien_translations');
    }
}
