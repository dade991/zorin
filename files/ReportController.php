<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\PaddyPurchase;
use App\Models\MillingBatch;
use App\Models\Farmer;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from ?? now()->startOfMonth()->toDateString();
        $to   = $request->to   ?? now()->toDateString();

        $totalRevenue  = Sale::whereBetween('sale_date', [$from, $to])->where('status', 'paid')->sum('total_amount');
        $totalCost     = PaddyPurchase::whereBetween('purchase_date', [$from, $to])->sum('total_cost');
        $profit        = $totalRevenue - $totalCost;

        $totalPaddy    = PaddyPurchase::whereBetween('purchase_date', [$from, $to])->sum('weight_kg');
        $totalMilled   = MillingBatch::whereBetween('batch_date', [$from, $to])->sum('rice_output_kg');
        $avgEfficiency = MillingBatch::whereBetween('batch_date', [$from, $to])->avg('efficiency_pct') ?? 0;

        $salesByDay = Sale::selectRaw('DATE(sale_date) as day, SUM(total_amount) as total')
            ->whereBetween('sale_date', [$from, $to])
            ->where('status', 'paid')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        return view('reports.index', compact(
            'from', 'to',
            'totalRevenue', 'totalCost', 'profit',
            'totalPaddy', 'totalMilled', 'avgEfficiency',
            'salesByDay'
        ));
    }

    public function export(Request $request)
    {
        // Simple CSV export
        $from = $request->from ?? now()->startOfMonth()->toDateString();
        $to   = $request->to   ?? now()->toDateString();

        $sales = Sale::with('customer')->whereBetween('sale_date', [$from, $to])->get();

        $csv  = "Date,Customer,Rice Type,Qty (kg),Price/kg,Total,Status\n";
        foreach ($sales as $s) {
            $csv .= implode(',', [
                $s->sale_date,
                '"' . ($s->customer->name ?? '') . '"',
                $s->rice_type,
                $s->quantity_kg,
                $s->price_per_kg,
                $s->total_amount,
                $s->status,
            ]) . "\n";
        }

        return response($csv, 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="zorin-report-' . $from . '-to-' . $to . '.csv"',
        ]);
    }
}
