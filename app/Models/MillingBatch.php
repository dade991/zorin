<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MillingBatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'batch_date','paddy_input_kg','rice_output_kg',
        'waste_kg','efficiency_pct','rice_type','notes',
    ];
    protected $casts = ['batch_date' => 'date'];
}
