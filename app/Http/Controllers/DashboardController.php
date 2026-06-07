<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'farmers'        => Farmer::count(),
            'purchases'      => PaddyPurchase::count(),
            'milling'        => MillingBatch::count(),
            'sales_total'    => Sale::sum('total_amount') ?? 0,
            'customers'      => Customer::count(),
            'pending_sales'  => Sale::where('status', 'pending')->count(),
            'inventory_stock'=> Inventory::sum('quantity_kg') ?? 0,
            'low_stock'      => Inventory::where('quantity_kg', '<', 100)->count(),
        ];

        $recentFarmers    = Farmer::latest()->take(5)->get();
        $recentPurchases  = PaddyPurchase::with('farmer')->latest()->take(5)->get();
        $recentActivities = collect(); // Empty for now

        // Monthly revenue (last 6 months)
        $monthlyRevenue = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyRevenue[] = [
                'month'  => $month->format('M'),
                'amount' => Sale::whereYear('created_at', $month->year)
                                ->whereMonth('created_at', $month->month)
                                ->sum('total_amount') ?? 0,
            ];
        }

        return view('dashboard', compact('stats', 'recentFarmers', 'recentPurchases', 'recentActivities', 'monthlyRevenue'));
    }
}