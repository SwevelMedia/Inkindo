<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table
                ->foreign('anggota_id')
                ->references('id')
                ->on('anggotas')
                ->onDelete('cascade');   
            $table->string('nama');
            $table->string('pemilik');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('tahun');
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
        Schema::dropIfExists('portofolio_anggotas');
    }
};
