<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    public function adjust(Request $request)
    {
        $data = $request->validate([
            'rice_type'   => 'required|string|max:100',
            'quantity_kg' => 'required|numeric',
            'unit_price'  => 'nullable|numeric|min:0',
            'action'      => 'required|in:add,subtract,set',
        ]);

        $inv = Inventory::firstOrCreate(
            ['rice_type' => $data['rice_type']],
            ['quantity_kg' => 0, 'unit_price' => 0]
        );

        match ($data['action']) {
            'add'      => $inv->increment('quantity_kg', $data['quantity_kg']),
            'subtract' => $inv->decrement('quantity_kg', $data['quantity_kg']),
            'set'      => $inv->update(['quantity_kg' => $data['quantity_kg']]),
        };

        if (!empty($data['unit_price'])) {
            $inv->update(['unit_price' => $data['unit_price']]);
        }

        return back()->with('success', 'Inventory adjusted.');
    }
}
