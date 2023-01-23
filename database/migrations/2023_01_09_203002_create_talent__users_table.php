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
        Schema::create('talent__users', function (Blueprint $table) {
            $table->foreignId('User_id');
            $table->foreignId('Talents_id');
            $table->primary(['User_id','Talents_id']);
            $table->foreign('User_id')->references('id')->on('Users')->onDelete('cascade');
            $table->foreign('Talents_id')->references('id')->on('talents')->onDelete('cascade');
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
        Schema::dropIfExists('talent__users');
    }
};
