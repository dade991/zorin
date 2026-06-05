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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ── Public Landing Page ──
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ── Authenticated Routes ──
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes
    Route::resource('farmers', FarmerController::class);
    Route::resource('paddy-purchases', PaddyPurchaseController::class);
    Route::resource('milling-batches', MillingBatchController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('customers', CustomerController::class);

    // Profile routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout handled by Breeze — included via auth routes below
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// ── Breeze Auth Routes ──
require __DIR__.'/auth.php';
