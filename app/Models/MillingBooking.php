<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MillingBooking extends Model
{
    use HasFactory;

    protected $table = 'milling_bookings';

    protected $fillable = [
        'user_id',
        'machine_id',
        'quantity_kg',
        'status',
        'booking_date',
        'completion_date',
        'notes',
    ];

    protected $casts = [
        'quantity_kg' => 'decimal:2',
        'booking_date' => 'datetime',
        'completion_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}