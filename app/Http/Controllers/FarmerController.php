<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Farmer::latest()->paginate(15);
        return view('farmers.index', compact('farmers'));
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:191',
            'phone'       => 'nullable|string|max:30',
            'village'     => 'nullable|string|max:100',
            'state'       => 'nullable|string|max:100',
            'id_number'   => 'nullable|string|max:60',
            'notes'       => 'nullable|string|max:500',
        ]);

        Farmer::create($data);

        return redirect()->route('farmers.index')
                         ->with('success', 'Farmer added successfully.');
    }

    public function show(Farmer $farmer)
    {
        $purchases = $farmer->paddyPurchases()->latest()->take(10)->get();
        return view('farmers.show', compact('farmer', 'purchases'));
    }

    public function edit(Farmer $farmer)
    {
        return view('farmers.edit', compact('farmer'));
    }

    public function update(Request $request, Farmer $farmer)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:191',
            'phone'       => 'nullable|string|max:30',
            'village'     => 'nullable|string|max:100',
            'state'       => 'nullable|string|max:100',
            'id_number'   => 'nullable|string|max:60',
            'notes'       => 'nullable|string|max:500',
        ]);

        $farmer->update($data);

        return redirect()->route('farmers.index')
                         ->with('success', 'Farmer updated successfully.');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return redirect()->route('farmers.index')
                         ->with('success', 'Farmer deleted.');
    }
}
