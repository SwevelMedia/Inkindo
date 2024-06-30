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
        Schema::create('poin_syarat_anggota', function (Blueprint $table) {
            $table->id();
            $table->text('poin');
            $table->unsignedBigInteger('judul_syarat_anggota_id');
            $table->foreign('judul_syarat_anggota_id')->references('id')->on('judul_syarat_anggota')->onDelete('cascade');
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
        Schema::dropIfExists('poin_syarat_anggota');
    }
};
