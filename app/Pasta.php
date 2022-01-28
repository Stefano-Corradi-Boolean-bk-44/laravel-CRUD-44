<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{


    protected $fillable = [
        'title',
        'description',
        'coocking_time',
        'type',
        'image',
        'slug'
    ];
}
