<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_model extends Model
{
    protected $table='datanya';
    protected $fillable=[
        'no_urut',
        'data',
        'datas',
    ];
}
