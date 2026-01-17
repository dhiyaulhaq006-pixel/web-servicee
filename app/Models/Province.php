<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
    ];

    // contoh function seperti aboutInfo()
    public static function info()
    {
        return [
            'title' => 'Provinsi di Indonesia',
            'desc'  => 'Data provinsi berisi nama, slug, gambar, dan deskripsi.'
        ];
    }
}
