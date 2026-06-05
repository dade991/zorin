<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Inventory;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get user-specific stats
        $userId = auth()->id();
        $userStats = [
            'my_purchases'  => PaddyPurchase::where('user_id', $userId)->count(),
            'my_sales'      => Sale::where('user_id', $userId)->count(),
            'my_sales_total'=> Sale::where('user_id', $userId)->sum('total_amount'),
            'my_pending_sales'=> Sale::where('user_id', $userId)->where('status', 'pending')->count(),
        ];

        $stats = [
            'farmers'       => Farmer::count(),
            'purchases'     => PaddyPurchase::sum('weight_kg'),
            'milling'       => Inventory::sum('quantity_kg'),
            'sales_total'   => Sale::sum('total_amount'),
            'customers'     => Customer::count(),
            'pending_sales' => Sale::where('status', 'pending')->count(),
        ];

        $recentFarmers  = Farmer::latest()->take(5)->get();
        $recentPurchases = PaddyPurchase::with('farmer')->latest()->take(5)->get();
        $recentBatches  = MillingBatch::latest()->take(5)->get();

        // Monthly revenue for chart (last 6 months)
        $monthlyRevenue = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyRevenue[] = [
                'month'  => $month->format('M'),
                'amount' => Sale::whereYear('created_at', $month->year)
                                ->whereMonth('created_at', $month->month)
                                ->sum('total_amount'),
            ];
        }

        // Recent activities - placeholder for now
        $recentActivities = collect();

        return view('dashboard', compact('stats', 'recentFarmers', 'recentPurchases', 'recentBatches', 'monthlyRevenue', 'userStats', 'recentActivities'));
    }
}
