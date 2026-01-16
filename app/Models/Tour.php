<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Culinary;

class Tour extends Model
{
    protected $fillable = [
        'province_id',
        'name',
        'image',
        'description'
    ];

    // Tour milik satu Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Tour punya banyak Culinary
    public function culinary()
    {
        return $this->hasMany(Culinary::class);
    }
}
