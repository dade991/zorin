<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','rice_type','quantity_kg',
        'price_per_kg','total_amount','sale_date','status','notes',
    ];

    protected $casts = ['sale_date' => 'date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
