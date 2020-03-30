<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='list_of_service';
    protected $fillable=['id_list','nama_service','status','service_owner','updated_at', 'created_at'];
}
