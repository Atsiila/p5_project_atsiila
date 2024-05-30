<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi_berita');
            $table->string('tanggal');
            $table->bigInteger('id_penulis')->unsigned();
            $table->foreign('id_penulis')->references('id')->on('penulis')->ondelete('cascade');
            $table->bigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategoris')->ondelete('cascade');
            $table->string('status');
            $table->string('image');
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
        Schema::dropIfExists('beritas');
    }
};
