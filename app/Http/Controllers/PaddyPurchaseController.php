<?php

namespace App\Http\Controllers;

use App\Models\PaddyPurchase;
use App\Models\Farmer;
use Illuminate\Http\Request;

class PaddyPurchaseController extends Controller
{
    public function index()
    {
        $purchases = PaddyPurchase::with('farmer')->latest()->paginate(15);
        return view('paddy-purchases.index', compact('purchases'));
    }

    public function create()
    {
        $farmers = Farmer::orderBy('name')->get();
        return view('paddy-purchases.create', compact('farmers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'farmer_id'      => 'required|exists:farmers,id',
            'weight_kg'      => 'required|numeric|min:0.1',
            'price_per_kg'   => 'required|numeric|min:0',
            'purchase_date'  => 'required|date',
            'notes'          => 'nullable|string|max:500',
        ]);

        $data['total_cost'] = $data['weight_kg'] * $data['price_per_kg'];

        PaddyPurchase::create($data);

        return redirect()->route('paddy-purchases.index')
                         ->with('success', 'Purchase recorded successfully.');
    }

    public function show(PaddyPurchase $paddyPurchase)
    {
        $paddyPurchase->load('farmer');
        return view('paddy-purchases.show', compact('paddyPurchase'));
    }

    public function edit(PaddyPurchase $paddyPurchase)
    {
        $farmers = Farmer::orderBy('name')->get();
        return view('paddy-purchases.edit', compact('paddyPurchase', 'farmers'));
    }

    public function update(Request $request, PaddyPurchase $paddyPurchase)
    {
        $data = $request->validate([
            'farmer_id'      => 'required|exists:farmers,id',
            'weight_kg'      => 'required|numeric|min:0.1',
            'price_per_kg'   => 'required|numeric|min:0',
            'purchase_date'  => 'required|date',
            'notes'          => 'nullable|string|max:500',
        ]);

        $data['total_cost'] = $data['weight_kg'] * $data['price_per_kg'];
        $paddyPurchase->update($data);

        return redirect()->route('paddy-purchases.index')
                         ->with('success', 'Purchase updated.');
    }

    public function destroy(PaddyPurchase $paddyPurchase)
    {
        $paddyPurchase->delete();
        return redirect()->route('paddy-purchases.index')
                         ->with('success', 'Purchase deleted.');
    }
}
