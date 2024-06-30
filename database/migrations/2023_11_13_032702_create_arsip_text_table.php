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
        Schema::create('arsip_text', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arsip_id');
            $table
                ->foreign('arsip_id')
                ->references('id')
                ->on('arsips')
                ->onDelete('cascade');
            $table->text('text');
            $table->string('halaman');
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
        Schema::dropIfExists('arsip_text');
    }
};
