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
        Schema::create('layanan_non_konstruksis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_layanan_non_konstruksi');
            $table->text('deskripsi_layanan_non_konstruksi');
            $table->unsignedBigInteger('klasifikasi_non_konstruksi_id');
            $table->foreign('klasifikasi_non_konstruksi_id')->references('id')->on('klasifikasi_non_konstruksis')->onDelete('cascade');
            // $table->foreignId('klasifikasi_non_konstruksi_id')->constrained('klasifikasi_non_konstruksis');
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
        Schema::dropIfExists('layanan_non_konstruksis');
    }
};
