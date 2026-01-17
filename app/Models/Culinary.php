<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliner';

    protected $fillable = [
        'kuliner_id',
        'name',
        'slug',          // tambahan
        'province_slug', // tambahan
        'image',
        'description',
    ];

    public static function info()
    {
        return [
            'title' => 'Kuliner Nusantara',
            'desc'  => 'Data kuliner berisi nama, gambar, dan deskripsi.'
        ];
    }
}
