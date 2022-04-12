<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucDanhmucnhacungcapTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('danhmuc__danhmucnhacungcap_translations', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     // Your translatable fields

        //     $table->integer('danhmucnhacungcap_id')->unsigned();
        //     $table->string('locale')->index();
        //     $table->unique(['danhmucnhacungcap_id', 'locale']);
        //     $table->foreign('danhmucnhacungcap_id')->references('id')->on('danhmuc__danhmucnhacungcaps')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('danhmuc__danhmucnhacungcap_translations', function (Blueprint $table) {
        //     $table->dropForeign(['danhmucnhacungcap_id']);
        // });
        // Schema::dropIfExists('danhmuc__danhmucnhacungcap_translations');
    }
}
