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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota')->nullable();
            $table->string('perusahaan');
            $table->string('alamat')->nullable();
            $table->enum('alamat_kabupaten', ['sleman', 'jogja', 'gunungkidul', 'bantul', 'kulonprogo']);
            $table->enum('kualifikasi', ['besar', 'menengah', 'kecil'])->default('kecil');
            $table->string('foto_perusahaan')->nullable();
            $table->string('logo')->nullable();
            // $table->string('email')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('penanggung_jawab');
            $table->string('no_hp')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->text('maps')->nullable();
            $table->string('npwp')->nullable();
            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('anggotas');
    }
};
