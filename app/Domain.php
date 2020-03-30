<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table='domain';
    protected $fillable=['id','nama_domain','keterangan','created_at','updated_at'];
}
