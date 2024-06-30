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
        Schema::create('daftar_kategori_portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->unsignedBigInteger('anggota_id');
            $table
                ->foreign('anggota_id')
                ->references('id')
                ->on('anggotas')
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
        Schema::dropIfExists('daftar_kategori_portofolios');
    }
};
