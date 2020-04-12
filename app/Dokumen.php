<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = "dokumen";
 
    protected $fillable = [
        'id',
        'file',
        'nama_proses',
        'no_bukti',
        'urutan_bukti',
        'keterangan',
        'nama_service',
        'target_skor',
        'created_at',
        'updated_at'];
}
