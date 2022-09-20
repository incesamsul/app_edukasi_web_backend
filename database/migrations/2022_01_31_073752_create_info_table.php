<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id_info');
            $table->unsignedInteger('id_kategori');
            $table->string('judul_info', 100);
            $table->string('foto1', 100)->nullable();
            $table->string('foto2', 100)->nullable();
            $table->string('foto3', 100)->nullable();
            $table->text('deskripsi');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}
