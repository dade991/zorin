<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->latest()->paginate(15);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers  = Customer::orderBy('name')->get();
        $inventory  = Inventory::all();
        return view('sales.create', compact('customers', 'inventory'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'rice_type'    => 'required|string|max:100',
            'quantity_kg'  => 'required|numeric|min:0.1',
            'price_per_kg' => 'required|numeric|min:0',
            'sale_date'    => 'required|date',
            'status'       => 'required|in:pending,paid,cancelled',
            'notes'        => 'nullable|string|max:500',
        ]);

        $data['total_amount'] = $data['quantity_kg'] * $data['price_per_kg'];

        // Deduct from inventory if paid
        if ($data['status'] === 'paid') {
            $inv = Inventory::where('rice_type', $data['rice_type'])->first();
            if ($inv && $inv->quantity_kg >= $data['quantity_kg']) {
                $inv->decrement('quantity_kg', $data['quantity_kg']);
            }
        }

        Sale::create($data);
        return redirect()->route('sales.index')->with('success', 'Sale recorded.');
    }

    public function show(Sale $sale)
    {
        $sale->load('customer');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $customers = Customer::orderBy('name')->get();
        $inventory = Inventory::all();
        return view('sales.edit', compact('sale', 'customers', 'inventory'));
    }

    public function update(Request $request, Sale $sale)
    {
        $data = $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'rice_type'    => 'required|string|max:100',
            'quantity_kg'  => 'required|numeric|min:0.1',
            'price_per_kg' => 'required|numeric|min:0',
            'sale_date'    => 'required|date',
            'status'       => 'required|in:pending,paid,cancelled',
            'notes'        => 'nullable|string|max:500',
        ]);

        $data['total_amount'] = $data['quantity_kg'] * $data['price_per_kg'];
        $sale->update($data);
        return redirect()->route('sales.index')->with('success', 'Sale updated.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted.');
    }
}
