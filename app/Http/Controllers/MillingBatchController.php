<?php

namespace App\Http\Controllers;

use App\Models\MillingBatch;
use App\Models\PaddyPurchase;
use App\Models\Inventory;
use Illuminate\Http\Request;

class MillingBatchController extends Controller
{
    public function index()
    {
        $batches = MillingBatch::latest()->paginate(15);
        return view('milling-batches.index', compact('batches'));
    }

    public function create()
    {
        return view('milling-batches.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'batch_date'       => 'required|date',
            'paddy_input_kg'   => 'required|numeric|min:0.1',
            'rice_output_kg'   => 'required|numeric|min:0.1',
            'waste_kg'         => 'nullable|numeric|min:0',
            'rice_type'        => 'nullable|string|max:100',
            'notes'            => 'nullable|string|max:500',
        ]);

        $data['efficiency_pct'] = round(($data['rice_output_kg'] / $data['paddy_input_kg']) * 100, 2);

        $batch = MillingBatch::create($data);

        // Auto-add to inventory
        $inv = Inventory::firstOrCreate(
            ['rice_type' => $data['rice_type'] ?? 'Standard'],
            ['quantity_kg' => 0, 'unit_price' => 0]
        );
        $inv->increment('quantity_kg', $data['rice_output_kg']);

        return redirect()->route('milling-batches.index')
                         ->with('success', 'Milling batch recorded. Inventory updated.');
    }

    public function show(MillingBatch $millingBatch)
    {
        return view('milling-batches.show', compact('millingBatch'));
    }

    public function edit(MillingBatch $millingBatch)
    {
        return view('milling-batches.edit', compact('millingBatch'));
    }

    public function update(Request $request, MillingBatch $millingBatch)
    {
        $data = $request->validate([
            'batch_date'       => 'required|date',
            'paddy_input_kg'   => 'required|numeric|min:0.1',
            'rice_output_kg'   => 'required|numeric|min:0.1',
            'waste_kg'         => 'nullable|numeric|min:0',
            'rice_type'        => 'nullable|string|max:100',
            'notes'            => 'nullable|string|max:500',
        ]);

        $data['efficiency_pct'] = round(($data['rice_output_kg'] / $data['paddy_input_kg']) * 100, 2);
        $millingBatch->update($data);

        return redirect()->route('milling-batches.index')
                         ->with('success', 'Milling batch updated.');
    }

    public function destroy(MillingBatch $millingBatch)
    {
        $millingBatch->delete();
        return redirect()->route('milling-batches.index')
                         ->with('success', 'Batch deleted.');
    }
}
