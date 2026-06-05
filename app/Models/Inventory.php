<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','rice_type','quantity_kg','unit_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function total()
    {
        return self::sum('quantity_kg');
    }
}
