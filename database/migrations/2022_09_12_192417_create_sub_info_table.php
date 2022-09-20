<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_info', function (Blueprint $table) {
            $table->increments('id_sub_info');
            $table->unsignedInteger('id_info');
            $table->string('judul_sub_info', 100);
            $table->string('foto1', 100)->nullable();
            $table->text('deskripsi');
            $table->timestamps();
            $table->foreign('id_info')->references('id_info')->on('info')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_info');
    }
}
