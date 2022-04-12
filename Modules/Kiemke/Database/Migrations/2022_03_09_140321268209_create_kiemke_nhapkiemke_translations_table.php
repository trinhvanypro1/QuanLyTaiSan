<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiemkeNhapkiemkeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiemke__nhapkiemke_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('nhapkiemke_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['nhapkiemke_id', 'locale']);
            $table->foreign('nhapkiemke_id')->references('id')->on('kiemke__nhapkiemkes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kiemke__nhapkiemke_translations', function (Blueprint $table) {
            $table->dropForeign(['nhapkiemke_id']);
        });
        Schema::dropIfExists('kiemke__nhapkiemke_translations');
    }
}
