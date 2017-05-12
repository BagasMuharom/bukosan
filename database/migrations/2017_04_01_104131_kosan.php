<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kosan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosan',function (Blueprint $table){
            $table->increments('id');
            $table->string('nama',30);
            $table->string('alamat',100);
            $table->longText('keterangan');
            $table->decimal('longitude');
            $table->decimal('latitude');
            $table->boolean('terverifikasi');
            $table->integer('jumlah_lantai');
            // Fasilitas
            $table->boolean('wifi')->default(0);
            $table->boolean('ac')->default(0);
            $table->boolean('kmdalam')->default(0);
            $table->boolean('dapur')->default(0);
            $table->boolean('tempatparkir')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('wifi')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kosan');
    }
}
