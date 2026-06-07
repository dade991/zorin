<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'capacity_kg_per_hour',
        'status',
        'location',
        'last_service_date',
    ];

    protected $casts = [
        'capacity_kg_per_hour' => 'decimal:2',
        'last_service_date' => 'date',
    ];
}