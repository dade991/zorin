<?php
// FILE: database/migrations/2024_01_01_000006_create_inventories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('rice_type')->unique();
            $table->decimal('quantity_kg', 10, 2)->default(0);
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('inventories'); }
};
