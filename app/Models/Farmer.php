<?php
// ════════════════════════════════════════════
// FILE: app/Models/Farmer.php
// ════════════════════════════════════════════
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','village','state','id_number','notes'];

    public function paddyPurchases()
    {
        return $this->hasMany(PaddyPurchase::class);
    }
}
