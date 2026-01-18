<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliner';

    protected $fillable = [
        'kuliner_id',
        'name',
        'slug',
        'province_slug',
        'image',
        'description',
    ];
}
