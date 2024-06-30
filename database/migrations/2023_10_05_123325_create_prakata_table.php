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
        Schema::create('prakatas', function (Blueprint $table) {
            $table->id();
            $table->text('nama_prakata')->nullable();
            $table->text('jabatan')->nullable();
            $table->text('sambutan')->nullable();
            $table->string('foto_prakata')->nullable();
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
        Schema::dropIfExists('prakata');
    }
};
