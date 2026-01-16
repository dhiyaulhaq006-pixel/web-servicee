<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;

class Culinary extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'image',
        'description'
    ];

    // Relasi: Culinary milik satu Tour
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
