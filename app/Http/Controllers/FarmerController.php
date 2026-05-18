<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Farmer::latest()->paginate(10);
        return view('farmers.index', compact('farmers'));
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'nullable|string|max:50',
            'village' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        Farmer::create($request->all());

        return redirect()->route('farmers.index')->with('success', 'Farmer added successfully.');
    }

    public function show(Farmer $farmer)
    {
        return view('farmers.show', compact('farmer'));
    }

    public function edit(Farmer $farmer)
    {
        return view('farmers.edit', compact('farmer'));
    }

    public function update(Request $request, Farmer $farmer)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'nullable|string|max:50',
            'village' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $farmer->update($request->all());

        return redirect()->route('farmers.index')->with('success', 'Farmer updated successfully.');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return redirect()->route('farmers.index')->with('success', 'Farmer deleted successfully.');
    }
}
