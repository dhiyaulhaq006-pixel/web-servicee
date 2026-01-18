<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name','slug','description','image'];

    public function kuliner()
    {
        return $this->hasMany(\App\Models\Kuliner::class, 'province_slug', 'slug');
    }

    public function wisata()
    {
        return $this->hasMany(\App\Models\Wisata::class, 'province_slug', 'slug');
    }

    public function adatIstiadat()
    {
        return $this->hasMany(\App\Models\AdatIstiadat::class, 'province_slug', 'slug');
    }
}
