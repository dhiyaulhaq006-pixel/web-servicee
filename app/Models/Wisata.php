<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata'; // nama tabel di database

    protected $fillable = [
        'wisata_id',
        'name',
        'slug',
        'province_slug',
        'description',
        'image',
    ];
}
