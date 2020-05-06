<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawan', function (Blueprint $table) {
            $table->Increments('id_relawan');
            $table->String('email_relawan')->unique();
            $table->string('password');
            $table->String('nama_relawan');
            $table->String('status_relawan')->nullable();
            $table->String('longitude_relawan');
            $table->String('latitude_relawan');
            $table->String('alamat_kelurahan_relawan');
            $table->String('alamat_kecamatan_relawan');
            $table->String('alamat_kabupaten_relawan');
            $table->String('alamat_provinsi_relawan');
            $table->String('alamat_lengkap_relawan');
            $table->string('keahlian');
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->integer('tim_id')->nullable();
            //$table->foreign('nama_tim')->references('nama_tim')->on('tim');
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
        Schema::dropIfExists('relawan');
    }
}
