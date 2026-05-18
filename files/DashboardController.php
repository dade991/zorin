<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'farmers'       => Farmer::count(),
            'purchases'     => PaddyPurchase::count(),
            'milling'       => MillingBatch::count(),
            'sales_total'   => Sale::sum('total_amount'),
            'customers'     => Customer::count(),
            'pending_sales' => Sale::where('status', 'pending')->count(),
        ];

        $recentFarmers  = Farmer::latest()->take(5)->get();
        $recentSales    = Sale::with('customer')->latest()->take(5)->get();
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

        return view('dashboard', compact('stats', 'recentFarmers', 'recentSales', 'recentBatches', 'monthlyRevenue'));
    }
}
