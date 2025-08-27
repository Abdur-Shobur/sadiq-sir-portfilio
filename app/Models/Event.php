<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'event_time',
        'time',
        'location',
        'is_active',
        'order',
        'status',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'event_date' => 'date',
        'event_time' => 'datetime',
    ];
}
