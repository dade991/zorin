{{-- FILE: resources/views/paddy-purchases/create.blade.php --}}
@extends('layouts.app')
@section('title','Record Purchase')
@section('page-title','Record Paddy Purchase')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Record Purchase</div>
        <div class="page-subtitle">Enter paddy delivery details</div>
    </div>
    <a href="{{ route('paddy-purchases.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('paddy-purchases.store') }}">
        @csrf
        <div class="crud-group">
            <label class="crud-label">Farmer *</label>
            <select name="farmer_id" class="crud-input @error('farmer_id') is-invalid @enderror" required>
                <option value="">— Select Farmer —</option>
                @foreach($farmers as $f)
                    <option value="{{ $f->id }}" {{ old('farmer_id')==$f->id ? 'selected' : '' }}>{{ $f->name }} ({{ $f->village ?? 'N/A' }})</option>
                @endforeach
            </select>
            @error('farmer_id')<div class="crud-error">{{ $message }}</div>@enderror
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Weight (kg) *</label>
                <input type="number" step="0.01" name="weight_kg" class="crud-input @error('weight_kg') is-invalid @enderror" value="{{ old('weight_kg') }}" placeholder="e.g. 500" required id="weightInput">
            </div>
            <div class="crud-group">
                <label class="crud-label">Price per kg (₦) *</label>
                <input type="number" step="0.01" name="price_per_kg" class="crud-input @error('price_per_kg') is-invalid @enderror" value="{{ old('price_per_kg') }}" placeholder="e.g. 350" required id="priceInput">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Total Cost</label>
            <input type="text" class="crud-input" id="totalDisplay" readonly placeholder="Auto-calculated" style="background:var(--p-pale);font-weight:700;color:var(--p);">
        </div>
        <div class="crud-group">
            <label class="crud-label">Purchase Date *</label>
            <input type="date" name="purchase_date" class="crud-input" value="{{ old('purchase_date', date('Y-m-d')) }}" required>
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;" placeholder="Optional notes">{{ old('notes') }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Save Purchase</button>
            <a href="{{ route('paddy-purchases.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function calcTotal() {
        const w = parseFloat(document.getElementById('weightInput').value) || 0;
        const p = parseFloat(document.getElementById('priceInput').value) || 0;
        document.getElementById('totalDisplay').value = w && p ? '₦' + (w*p).toLocaleString('en-NG',{minimumFractionDigits:2}) : '';
    }
    document.getElementById('weightInput').addEventListener('input', calcTotal);
    document.getElementById('priceInput').addEventListener('input', calcTotal);
</script>
@endpush
@endsection
