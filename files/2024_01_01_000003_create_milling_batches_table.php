<?php
// FILE: database/migrations/2024_01_01_000003_create_milling_batches_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('milling_batches', function (Blueprint $table) {
            $table->id();
            $table->date('batch_date');
            $table->decimal('paddy_input_kg', 10, 2);
            $table->decimal('rice_output_kg', 10, 2);
            $table->decimal('waste_kg', 10, 2)->default(0);
            $table->decimal('efficiency_pct', 5, 2)->default(0);
            $table->string('rice_type')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('milling_batches'); }
};
