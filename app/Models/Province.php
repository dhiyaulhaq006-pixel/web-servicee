<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;
use App\Models\Custom;

class Province extends Model
{
    protected $fillable = [
    'name',
    'description',
    'image'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function customs()
    {
        return $this->hasMany(Custom::class);
    }
}
