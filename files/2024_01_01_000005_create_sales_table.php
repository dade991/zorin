<?php
// FILE: database/migrations/2024_01_01_000005_create_sales_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('rice_type');
            $table->decimal('quantity_kg', 10, 2);
            $table->decimal('price_per_kg', 10, 2);
            $table->decimal('total_amount', 12, 2);
            $table->date('sale_date');
            $table->enum('status', ['pending','paid','cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sales'); }
};
