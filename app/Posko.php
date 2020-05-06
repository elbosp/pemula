<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posko extends Model
{
    protected $table = "posko";
    public $primaryKey = "id_posko";
    protected $nama_posko = "nama_posko";
    protected $nama_bencana = "nama_bencana";
    protected $waktu_bencana = "waktu_bencana";
    protected $latitude_posko = "latitude_posko";
    protected $longitude_posko = "longitude_posko";
    protected $alamat_jalan_posko = "alamat_jalan_posko";
    protected $alamat_keluarahan_posko = "alamat_keluarahan_posko";
    protected $alamat_kecamatan_posko = "alamat_kecamatan_posko";
    protected $alamat_kabupaten_posko = "alamat_kabupaten_posko";
    protected $alamat_provinsi_posko = "alamat_provinsi_posko";
    protected $alamat_lengkap_posko = "alamat_lengkap_posko";

    public function tim() {
      return $this->hasMany('App\Tim');
    }
}
