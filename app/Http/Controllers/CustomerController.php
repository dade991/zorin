<?php
// ─────────────────────────────────────────
// FILE: app/Http/Controllers/CustomerController.php
// ─────────────────────────────────────────
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(15);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:191',
            'phone'   => 'nullable|string|max:30',
            'address' => 'nullable|string|max:300',
            'email'   => 'nullable|email|max:191',
        ]);
        Customer::create($data);
        return redirect()->route('customers.index')->with('success', 'Customer added.');
    }

    public function show(Customer $customer)
    {
        $sales = $customer->sales()->latest()->take(10)->get();
        return view('customers.show', compact('customer', 'sales'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:191',
            'phone'   => 'nullable|string|max:30',
            'address' => 'nullable|string|max:300',
            'email'   => 'nullable|email|max:191',
        ]);
        $customer->update($data);
        return redirect()->route('customers.index')->with('success', 'Customer updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted.');
    }
}
