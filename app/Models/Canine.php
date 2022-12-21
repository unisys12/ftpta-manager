<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canine extends Model
{
    use HasFactory;

    /**
     * returns the breed of the canine
     *
     * @return resource
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * Returns the owner of the canine
     *
     * @return resource
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the veternarian for the canine
     *
     * @return resource
     */
    public function veternarian()
    {
        return $this->belongsTo(Veternarian::class);
    }

    /**
     * Returns the Breeder of the canine, if selected
     */
    public function breeder()
    {
        return $this->belongsTo(Breeder::class);
    }
}
