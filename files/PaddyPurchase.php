<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaddyPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id', 'weight_kg', 'price_per_kg',
        'total_cost', 'purchase_date', 'notes',
    ];

    protected $casts = ['purchase_date' => 'date'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
