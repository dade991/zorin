{{-- FILE: resources/views/milling-batches/create.blade.php --}}
@extends('layouts.app')
@section('title','New Batch')
@section('page-title','New Milling Batch')

@section('content')
<div class="page-header">
    <div><div class="page-title">New Milling Batch</div><div class="page-subtitle">Log paddy input and rice output</div></div>
    <a href="{{ route('milling-batches.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('milling-batches.store') }}">
        @csrf
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Batch Date *</label>
                <input type="date" name="batch_date" class="crud-input" value="{{ old('batch_date', date('Y-m-d')) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Type</label>
                <input type="text" name="rice_type" class="crud-input" value="{{ old('rice_type','Standard') }}" placeholder="e.g. Parboiled, White">
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Paddy Input (kg) *</label>
                <input type="number" step="0.01" name="paddy_input_kg" id="inputKg" class="crud-input" value="{{ old('paddy_input_kg') }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Output (kg) *</label>
                <input type="number" step="0.01" name="rice_output_kg" id="outputKg" class="crud-input" value="{{ old('rice_output_kg') }}" required>
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Waste (kg)</label>
                <input type="number" step="0.01" name="waste_kg" class="crud-input" value="{{ old('waste_kg',0) }}">
            </div>
            <div class="crud-group">
                <label class="crud-label">Efficiency</label>
                <input type="text" id="effDisplay" class="crud-input" readonly style="background:var(--p-pale);color:var(--p);font-weight:700;">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;">{{ old('notes') }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Save Batch</button>
            <a href="{{ route('milling-batches.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function calcEff() {
        const i = parseFloat(document.getElementById('inputKg').value) || 0;
        const o = parseFloat(document.getElementById('outputKg').value) || 0;
        document.getElementById('effDisplay').value = i > 0 ? (o/i*100).toFixed(2) + '%' : '';
    }
    document.getElementById('inputKg').addEventListener('input', calcEff);
    document.getElementById('outputKg').addEventListener('input', calcEff);
</script>
@endpush
@endsection
