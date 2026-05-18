{{-- FILE: resources/views/sales/create.blade.php --}}
@extends('layouts.app')
@section('title','New Sale')
@section('page-title','New Sale')

@section('content')
<div class="page-header">
    <div><div class="page-title">Record Sale</div></div>
    <a href="{{ route('sales.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Customer *</label>
                <select name="customer_id" class="crud-input @error('customer_id') is-invalid @enderror" required>
                    <option value="">— Select Customer —</option>
                    @foreach($customers as $c)
                        <option value="{{ $c->id }}" {{ old('customer_id')==$c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('customer_id')<div class="crud-error">{{ $message }}</div>@enderror
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Type *</label>
                <select name="rice_type" class="crud-input" required>
                    <option value="">— Select Type —</option>
                    @foreach($inventory as $inv)
                        <option value="{{ $inv->rice_type }}" {{ old('rice_type')==$inv->rice_type ? 'selected' : '' }}>
                            {{ $inv->rice_type }} ({{ number_format($inv->quantity_kg,1) }} kg in stock)
                        </option>
                    @endforeach
                    <option value="Custom">Custom</option>
                </select>
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Quantity (kg) *</label>
                <input type="number" step="0.01" name="quantity_kg" id="sQty" class="crud-input" value="{{ old('quantity_kg') }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Price per kg (₦) *</label>
                <input type="number" step="0.01" name="price_per_kg" id="sPrice" class="crud-input" value="{{ old('price_per_kg') }}" required>
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Total Amount</label>
                <input type="text" id="sTotalDisplay" class="crud-input" readonly style="background:var(--p-pale);font-weight:700;color:var(--p)">
            </div>
            <div class="crud-group">
                <label class="crud-label">Sale Date *</label>
                <input type="date" name="sale_date" class="crud-input" value="{{ old('sale_date', date('Y-m-d')) }}" required>
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Status *</label>
            <select name="status" class="crud-input" required>
                <option value="pending" {{ old('status','pending')==='pending' ? 'selected' : '' }}>⏳ Pending</option>
                <option value="paid" {{ old('status')==='paid' ? 'selected' : '' }}>✅ Paid</option>
                <option value="cancelled" {{ old('status')==='cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
            </select>
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;">{{ old('notes') }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Record Sale</button>
            <a href="{{ route('sales.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function calcSaleTotal() {
        const q = parseFloat(document.getElementById('sQty').value) || 0;
        const p = parseFloat(document.getElementById('sPrice').value) || 0;
        document.getElementById('sTotalDisplay').value = q && p ? '₦' + (q*p).toLocaleString('en-NG',{minimumFractionDigits:2}) : '';
    }
    document.getElementById('sQty').addEventListener('input', calcSaleTotal);
    document.getElementById('sPrice').addEventListener('input', calcSaleTotal);
</script>
@endpush
@endsection
