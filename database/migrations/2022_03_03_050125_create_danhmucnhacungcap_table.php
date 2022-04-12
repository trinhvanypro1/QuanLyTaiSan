<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucnhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhmucnhacungcap', function (Blueprint $table) {
            $table->primary('manhacungcap');
            $table->string('sdt');
            $table->string('diachi')->nullable();
            $table->text('mota')->nullable();
            $table->string('quanlydulieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhmucnhacungcap');
    }
}
