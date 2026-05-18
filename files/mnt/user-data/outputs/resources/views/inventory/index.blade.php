{{-- FILE: resources/views/inventory/index.blade.php --}}
@extends('layouts.app')
@section('title','Inventory')
@section('page-title','Inventory')

@section('content')
<div class="page-header">
    <div><div class="page-title">Rice Inventory</div><div class="page-subtitle">Live stock levels</div></div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;align-items:start;flex-wrap:wrap;">

    <div class="dash-card">
        <div class="dash-card-header"><span class="dash-card-title">📦 Current Stock</span></div>
        <table class="dash-table">
            <thead><tr><th>Rice Type</th><th>Qty (kg)</th><th>Unit Price (₦)</th><th>Value (₦)</th></tr></thead>
            <tbody>
                @forelse($inventory as $inv)
                <tr>
                    <td style="font-weight:600">{{ $inv->rice_type }}</td>
                    <td>
                        <span class="tbadge {{ $inv->quantity_kg < 100 ? 'tbadge-yellow' : 'tbadge-green' }}">
                            {{ number_format($inv->quantity_kg,1) }} kg
                        </span>
                    </td>
                    <td>₦{{ number_format($inv->unit_price,2) }}</td>
                    <td style="font-weight:700">₦{{ number_format($inv->quantity_kg * $inv->unit_price,2) }}</td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;padding:2rem;color:var(--tx-m)">No inventory. Run a milling batch to add stock.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="form-card" style="max-width:100%">
        <div class="form-section-title">Adjust Inventory</div>
        <form method="POST" action="{{ route('inventory.adjust') }}">
            @csrf
            <div class="crud-group">
                <label class="crud-label">Rice Type *</label>
                <input type="text" name="rice_type" class="crud-input" placeholder="e.g. Standard, Parboiled" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Quantity (kg) *</label>
                <input type="number" step="0.01" name="quantity_kg" class="crud-input" placeholder="e.g. 200" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Unit Price (₦)</label>
                <input type="number" step="0.01" name="unit_price" class="crud-input" placeholder="e.g. 800">
            </div>
            <div class="crud-group">
                <label class="crud-label">Action *</label>
                <select name="action" class="crud-input" required>
                    <option value="add">➕ Add to stock</option>
                    <option value="subtract">➖ Remove from stock</option>
                    <option value="set">📝 Set exact amount</option>
                </select>
            </div>
            <div class="crud-actions">
                <button type="submit" class="btn btn-primary">Apply Adjustment</button>
            </div>
        </form>
    </div>

</div>
@endsection
