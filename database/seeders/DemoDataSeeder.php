<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Farmer;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Inventory;
use Carbon\Carbon;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demo user if not exists
        $user = User::firstOrCreate(
            ['email' => 'demo@zorin.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create sample farmers
        $farmersData = [
            [
                'name' => 'John Ade',
                'phone' => '+2348012345678',
                'village' => 'Owo',
                'state' => 'Ondo',
                'id_number' => 'FAR001',
                'notes' => 'Reliable farmer with quality produce'
            ],
            [
                'name' => 'Michael Bello',
                'phone' => '+2348023456789',
                'village' => 'Akure',
                'state' => 'Ondo',
                'id_number' => 'FAR002',
                'notes' => 'Supplies organic paddy'
            ],
            [
                'name' => 'Samuel Ojo',
                'phone' => '+2348034567890',
                'village' => 'Ile-Oluji',
                'state' => 'Ondo',
                'id_number' => 'FAR003',
                'notes' => 'Large scale farmer'
            ],
        ];

        $farmers = [];
        foreach ($farmersData as $data) {
            $farmers[] = Farmer::create($data);
        }

        // Create sample paddy purchases
        $purchasesData = [
            [
                'farmer_id' => $farmers[0]->id,
                'user_id' => $user->id,
                'weight_kg' => 1000.00,
                'price_per_kg' => 450.00,
                'total_cost' => 450000.00,
                'purchase_date' => Carbon::now()->subDays(5),
                'notes' => 'First purchase of the season'
            ],
            [
                'farmer_id' => $farmers[1]->id,
                'user_id' => $user->id,
                'weight_kg' => 750.00,
                'price_per_kg' => 460.00,
                'total_cost' => 345000.00,
                'purchase_date' => Carbon::now()->subDays(3),
                'notes' => 'Organic variety'
            ],
            [
                'farmer_id' => $farmers[2]->id,
                'user_id' => $user->id,
                'weight_kg' => 1200.00,
                'price_per_kg' => 440.00,
                'total_cost' => 528000.00,
                'purchase_date' => Carbon::now()->subDays(1),
                'notes' => 'Bulk purchase'
            ],
        ];

        foreach ($purchasesData as $data) {
            PaddyPurchase::create($data);
        }

        // Create sample milling batches
        $batchesData = [
            [
                'batch_date' => Carbon::now()->subDays(4),
                'paddy_input_kg' => 1000.00,
                'rice_output_kg' => 650.00,
                'waste_kg' => 350.00,
                'efficiency_pct' => 65.00,
                'rice_type' => 'Local Long Grain',
                'notes' => 'Standard processing'
            ],
            [
                'batch_date' => Carbon::now()->subDays(2),
                'paddy_input_kg' => 800.00,
                'rice_output_kg' => 560.00,
                'waste_kg' => 240.00,
                'efficiency_pct' => 70.00,
                'rice_type' => 'Imported Parboiled',
                'notes' => 'High efficiency batch'
            ],
            [
                'batch_date' => Carbon::now()->yesterday(),
                'paddy_input_kg' => 900.00,
                'rice_output_kg' => 585.00,
                'waste_kg' => 315.00,
                'efficiency_pct' => 65.00,
                'rice_type' => 'Brown Rice',
                'notes' => 'Specialty variety'
            ],
        ];

        foreach ($batchesData as $data) {
            MillingBatch::create($data);
        }

        // Create sample customers
        $customersData = [
            [
                'name' => 'ABC Rice Traders',
                'phone' => '+2348045678901',
                'address' => '123 Market Street, Lagos',
                'email' => 'contact@abctraders.com'
            ],
            [
                'name' => 'Queen\'s Kitchen',
                'phone' => '+2348056789012',
                'address' => '456 Oak Avenue, Abuja',
                'email' => 'info@queenskitchen.com.ng'
            ],
            [
                'name' => 'Golden Spoon Restaurant',
                'phone' => '+2348067890123',
                'address' => '789 Rice Road, Port Harcourt',
                'email' => 'orders@goldenspoon.com.ng'
            ],
        ];

        $customers = [];
        foreach ($customersData as $data) {
            $customers[] = Customer::create($data);
        }

        // Create sample sales
        $salesData = [
            [
                'customer_id' => $customers[0]->id,
                'user_id' => $user->id,
                'rice_type' => 'Local Long Grain',
                'quantity_kg' => 500.00,
                'price_per_kg' => 650.00,
                'total_amount' => 325000.00,
                'sale_date' => Carbon::now()->subDays(4),
                'status' => 'paid',
                'notes' => 'Regular wholesale order'
            ],
            [
                'customer_id' => $customers[1]->id,
                'user_id' => $user->id,
                'rice_type' => 'Imported Parboiled',
                'quantity_kg' => 300.00,
                'price_per_kg' => 750.00,
                'total_amount' => 225000.00,
                'sale_date' => Carbon::now()->subDays(2),
                'status' => 'paid',
                'notes' => 'Premium rice order'
            ],
            [
                'customer_id' => $customers[2]->id,
                'user_id' => $user->id,
                'rice_type' => 'Brown Rice',
                'quantity_kg' => 200.00,
                'price_per_kg' => 700.00,
                'total_amount' => 140000.00,
                'sale_date' => Carbon::now()->yesterday(),
                'status' => 'pending',
                'notes' => 'Health food store order'
            ],
        ];

        foreach ($salesData as $data) {
            Sale::create($data);
        }

        // Create sample inventory
        $inventoryData = [
            [
                'rice_type' => 'Local Long Grain',
                'quantity_kg' => 2000.00,
                'unit_price' => 600.00
            ],
            [
                'rice_type' => 'Imported Parboiled',
                'quantity_kg' => 1500.00,
                'unit_price' => 800.00
            ],
            [
                'rice_type' => 'Brown Rice',
                'quantity_kg' => 800.00,
                'unit_price' => 750.00
            ],
            [
                'rice_type' => 'Local Short Grain',
                'quantity_kg' => 1200.00,
                'unit_price' => 580.00
            ],
        ];

        foreach ($inventoryData as $data) {
            Inventory::create($data);
        }

        $this->command->info('Demo data seeded successfully!');
    }
}