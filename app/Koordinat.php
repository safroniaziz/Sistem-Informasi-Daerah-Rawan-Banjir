<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    protected $fillable = [
        'kelurahan_id','lat','long'
    ];
}
