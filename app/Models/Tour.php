<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'wisata_id',
        'name',
        'slug',          // tambahan
        'province_slug', // tambahan
        'image',
        'description',
    ];

    public static function info()
    {
        return [
            'title' => 'Wisata Nusantara',
            'desc'  => 'Data wisata berisi nama tempat, gambar, dan deskripsi.'
        ];
    }
}
