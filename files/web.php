<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\PaddyPurchaseController;
use App\Http\Controllers\MillingBatchController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;

// ── Public Landing Page ──
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ── Authenticated Routes ──
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Farmers
    Route::resource('farmers', FarmerController::class);

    // Paddy Purchases
    Route::resource('paddy-purchases', PaddyPurchaseController::class);

    // Milling Batches
    Route::resource('milling-batches', MillingBatchController::class);

    // Inventory
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/inventory/adjust', [InventoryController::class, 'adjust'])->name('inventory.adjust');

    // Customers
    Route::resource('customers', CustomerController::class);

    // Sales
    Route::resource('sales', SaleController::class);

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');

    // Settings (theme save)
    Route::post('/settings/theme', function (\Illuminate\Http\Request $req) {
        session(['theme' => $req->theme]);
        return back();
    })->name('settings.theme');

    // Logout handled by Breeze — included via auth routes below
});

// ── Breeze Auth Routes ──
require __DIR__.'/auth.php';
