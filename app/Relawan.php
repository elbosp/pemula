<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $table = "relawan";
    protected $primaryKey = "id_relawan";
    protected $email_relawan = "email_relawan";
    protected $nama_relawan = "nama_relawan";
    protected $status_relawan = "status_relawan";
    protected $peran_relawan = "peran_relawan";
    protected $longitude_relawan = "longitude_relawan";
    protected $latitude_relawan = "latitude_relawan";
    protected $alamat_jalan_relawan = "alamat_jalan_relawan";
    protected $alamat_keluarahan_relawan = "alamat_keluarahan_relawan";
    protected $alamat_kecamatan_relawan = "alamat_kecamatan_relawan";
    protected $alamat_kabupaten_relawan = "alamat_kabupaten_relawan";
    protected $alamat_provinsi_relawan = "alamat_provinsi_relawan";
    protected $alamat_lengkap_relawan = "alamat_lengkap_relawan";
    protected $keahlian = "keahlian";
    protected $fileName= "filename";
    protected $mime = "mime";
    protected $original_filename = "original_filename";
    protected $password = "password";

    public function tim() {
      return $this-> belongsTo('App\Tim', 'tim_id');
    }

}
