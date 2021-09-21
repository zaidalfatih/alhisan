<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlhisanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alhisan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telp')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('ig')->nullable();
            $table->string('fb')->nullable();
            $table->string('youtube')->nullable();
            $table->string('telegram')->nullable();
            $table->text('alamat')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('email')->nullable();
            $table->string('favicon')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('alhisan');
    }
}
