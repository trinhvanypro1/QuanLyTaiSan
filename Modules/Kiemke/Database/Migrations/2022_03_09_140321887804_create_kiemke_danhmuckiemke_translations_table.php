<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiemkeDanhmuckiemkeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiemke__danhmuckiemke_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('danhmuckiemke_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['danhmuckiemke_id', 'locale']);
            $table->foreign('danhmuckiemke_id')->references('id')->on('kiemke__danhmuckiemkes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kiemke__danhmuckiemke_translations', function (Blueprint $table) {
            $table->dropForeign(['danhmuckiemke_id']);
        });
        Schema::dropIfExists('kiemke__danhmuckiemke_translations');
    }
}
