<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perawatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tanaman_id');
            $table->date('tanggal_perawatan');
            $table->string('jenis_perawatan', 150)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->foreign('tanaman_id')->references('id')->on('tanamans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perawatans');
    }
}; 