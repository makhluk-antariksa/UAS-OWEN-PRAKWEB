<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tanamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman', 150);
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255)->nullable();
            $table->date('tanggal_tanam')->nullable();
            $table->string('lokasi', 150)->nullable();
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanamans');
    }
}; 