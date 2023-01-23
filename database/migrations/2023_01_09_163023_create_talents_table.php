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
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->text('Deskripsi',50);
            $table->integer('Umur');
            $table->string("Alamat")->nullable();
            $table->string('No');
            $table->string('Image');
            $table->integer("Berhasil")->default(0);
            $table->integer('Followers')->default(0);
            $table->double('Rating')->default(0);
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
        Schema::dropIfExists('talents');
    }
};
