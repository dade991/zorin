{{-- FILE: resources/views/milling-batches/edit.blade.php --}}
@extends('layouts.app')
@section('title','Edit Batch')
@section('page-title','Edit Milling Batch')

@section('content')
<div class="page-header">
    <div><div class="page-title">Edit Batch #{{ $millingBatch->id }}</div></div>
    <a href="{{ route('milling-batches.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('milling-batches.update', $millingBatch) }}">
        @csrf @method('PUT')
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Batch Date *</label>
                <input type="date" name="batch_date" class="crud-input" value="{{ old('batch_date', $millingBatch->batch_date->format('Y-m-d')) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Type</label>
                <input type="text" name="rice_type" class="crud-input" value="{{ old('rice_type', $millingBatch->rice_type) }}">
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Paddy Input (kg) *</label>
                <input type="number" step="0.01" name="paddy_input_kg" class="crud-input" value="{{ old('paddy_input_kg', $millingBatch->paddy_input_kg) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Output (kg) *</label>
                <input type="number" step="0.01" name="rice_output_kg" class="crud-input" value="{{ old('rice_output_kg', $millingBatch->rice_output_kg) }}" required>
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Waste (kg)</label>
            <input type="number" step="0.01" name="waste_kg" class="crud-input" value="{{ old('waste_kg', $millingBatch->waste_kg) }}">
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;">{{ old('notes', $millingBatch->notes) }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Update Batch</button>
            <a href="{{ route('milling-batches.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
