<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'allDay' => 'boolean',
        'editable' => 'boolean',
        'overlap' => 'boolean',
    ];

    public function canine()
    {
        return $this->belongsTo(Canine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
