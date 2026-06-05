<?php
// FILE: database/migrations/2024_01_01_000002_create_paddy_purchases_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('paddy_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained()->cascadeOnDelete();
            $table->decimal('weight_kg', 10, 2);
            $table->decimal('price_per_kg', 10, 2);
            $table->decimal('total_cost', 12, 2);
            $table->date('purchase_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('paddy_purchases'); }
};
