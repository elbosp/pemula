<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korban extends Model
{
    protected $table = "korban";
    protected $primaryKey = "id_korban";
    protected $status_korban = "status_korban";
    protected $nama_korban = "nama_korban";
}
