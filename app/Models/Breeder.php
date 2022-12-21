<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;

    public function canines()
    {
        return $this->hasMany(Canine::class);
    }
}
