<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdatIstiadat extends Model
{
    protected $table = 'adatistiadat'; // sesuai migration

    protected $fillable = [
        'adat_id',
        'name',
        'slug',
        'province_slug',
        'image',
        'description',
    ];

    // optional jika primary key bukan id
    // protected $primaryKey = 'adat_id';
    // public $incrementing = true;
    // protected $keyType = 'int';
}
