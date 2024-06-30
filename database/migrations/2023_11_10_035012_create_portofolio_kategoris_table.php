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
        Schema::create('portofolio_kategoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('portofolio_id');
            $table
                ->foreign('kategori_id')
                ->references('id')
                ->on('daftar_kategori_portofolios')
                ->onDelete('cascade');
            $table
                ->foreign('portofolio_id')
                ->references('id')
                ->on('portofolio_anggotas')
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
        Schema::dropIfExists('portofolio_kategoris');
    }
};
