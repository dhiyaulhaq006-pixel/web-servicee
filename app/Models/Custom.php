<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Custom extends Model
{
    protected $fillable = [
        'province_id',
        'name',
        'image',
        'description'
    ];

    // Relasi: Custom milik satu Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}