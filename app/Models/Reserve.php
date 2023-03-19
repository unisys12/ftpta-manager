<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'allDay',
        'start',
        'end',
        'title',
        'url',
        'editable',
    ];

    protected $casts = [
        'allDay' => 'boolean',
        'start' => 'datetime',
        'end' => 'datetime',
        'editable' => 'boolean'
    ];

    /**
     * Could be expaded to support individual people blocking time off
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
