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
        Schema::create('layanan_konstruksis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_layanan_konstruksi');
            $table->text('deskripsi_layanan_konstruksi');
            $table->unsignedBigInteger('klasifikasi_konstruksi_id');
            $table->foreign('klasifikasi_konstruksi_id')->references('id')->on('klasifikasi_konstruksis')->onDelete('cascade');
            // $table->foreignId('klasifikasi_konstruksi_id')->constrained('klasifikasi_konstruksis');
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
        Schema::dropIfExists('layanan_konstruksis');
    }
};
