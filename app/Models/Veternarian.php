<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veternarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'vet_name',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'email'
    ];

    /**
     * Returns the canines associated with this vet
     *
     * @return mixed
     */
    public function canines()
    {
        return $this->hasMany(Canine::class);
    }
}
