<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    protected $table = "skor";

    protected $fillable = ['id', 'skor_maturity', 'rekom', 'nama_proses', 'sub_domain', 'kode_bukti'];
}
