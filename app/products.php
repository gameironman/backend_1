<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';
    protected $fillable = [
        'name', 'type', 'image_url','text','type_id','place'
    ];
}
