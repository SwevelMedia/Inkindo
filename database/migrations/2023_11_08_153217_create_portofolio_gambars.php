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
        Schema::create('portofolio_gambars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portofolio_id');
            $table
                ->foreign('portofolio_id')
                ->references('id')
                ->on('portofolio_anggotas')
                ->onDelete('cascade');
            $table->string('gambar');
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
        Schema::dropIfExists('portofolio_gambars');
    }
};
