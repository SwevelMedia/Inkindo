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
        Schema::create('klasifikasi_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klasifikasi_id');
            $table->unsignedBigInteger('anggota_id');
            $table
                ->foreign('klasifikasi_id')
                ->references('id')
                ->on('klasifikasis')
                ->onDelete('cascade');
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
        Schema::dropIfExists('klasifikasi_anggotas');
    }
};
