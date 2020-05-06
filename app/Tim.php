<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = "tim";
    public $primaryKey = "id_tim";
    protected $nama_tim = "nama_tim";
    protected $peran_tim = "peran_tim";
    protected $anggota_tim = "anggota_tim";
    protected $ketua_tim = "ketua_tim";
    protected $posko_id = "posko_id";

    public function posko() {
      return $this-> belongsTo('App\Posko','posko_id');
    }

    public function relawan() {
      return $this->hasMany('App\Relawan', 'tim_id');
    }
}
