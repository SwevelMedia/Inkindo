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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('prakata')->nullable();
            $table->text('deskripsi_home')->nullable();
            $table->string('gambar_prakata')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('daftar_misi')->nullable();
            $table->string('gambar_visi')->nullable();
            $table->text('kode_etik')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('maps')->nullable();
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
        Schema::dropIfExists('profils');
    }
};
