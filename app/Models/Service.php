<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'service_category_id', 'price', 'price_increment_id', 'img_path'];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function price_increment()
    {
        return $this->belongsTo(PriceIncrement::class);
    }
}
