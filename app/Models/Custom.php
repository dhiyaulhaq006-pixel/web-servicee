<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdatIstiadat extends Model
{
    protected $table = 'adatistiadat';

    protected $fillable = [
        'adat_id',
        'name',
        'image',
        'description',
    ];

    // contoh function seperti aboutInfo()
    public static function info()
    {
        return [
            'title' => 'Adat Istiadat Nusantara',
            'desc'  => 'Data adat istiadat berisi nama, gambar, dan deskripsi.'
        ];
    }
}
