<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'backgroundColor', 'borderColor', 'textColor'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
