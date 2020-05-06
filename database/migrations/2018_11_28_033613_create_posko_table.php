<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoskoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posko', function (Blueprint $table) {
            $table->increments('id_posko');
            $table->String('nama_posko');
            $table->String('nama_bencana');
            $table->date('waktu_bencana');
            $table->String('latitude_posko')->nullable();
            $table->String('longitude_posko')->nullable();
            $table->String('alamat_kelurahan_posko')->nullable();
            $table->String('alamat_kecamatan_posko')->nullable();
            $table->String('alamat_kabupaten_posko')->nullable();
            $table->String('alamat_provinsi_posko')->nullable();
            $table->String('alamat_lengkap_posko')->nullable();
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
        Schema::dropIfExists('posko');
    }
}
