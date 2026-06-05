<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkadmin'); // Assuming we register the middleware as 'checkadmin'
    }

    public function index()
    {
        // Admin-specific stats
        $stats = [
            'farmers'       => Farmer::count(),
            'purchases'     => PaddyPurchase::count(),
            'milling'       => MillingBatch::count(),
            'sales_total'   => Sale::sum('total_amount'),
            'customers'     => Customer::count(),
            'pending_sales' => Sale::where('status', 'pending')->count(),
            'users'         => User::count(),
            'admins'        => User::where('is_admin', true)->count(),
        ];

        $recentFarmers  = Farmer::latest()->take(5)->get();
        $recentSales    = Sale::with('customer')->latest()->take(5)->get();
        $recentBatches  = MillingBatch::latest()->take(5)->get();
        $recentUsers    = User::latest()->take(5)->get();

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

        return view('admin.dashboard', compact('stats', 'recentFarmers', 'recentSales', 'recentBatches', 'recentUsers', 'monthlyRevenue'));
    }
}
