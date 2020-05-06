<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = "id_pengguna";
    protected $nama_pengguna = "nama_pengguna";
    protected $email_pengguna = "email_pengguna";
    protected $password = "password";
    protected $evaluasi_kerja = "evaluasi_kerja";
}
