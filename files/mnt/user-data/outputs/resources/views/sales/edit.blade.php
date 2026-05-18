{{-- FILE: resources/views/sales/edit.blade.php --}}
@extends('layouts.app')
@section('title','Edit Sale')
@section('page-title','Edit Sale')

@section('content')
<div class="page-header">
    <div><div class="page-title">Edit Sale #{{ $sale->id }}</div></div>
    <a href="{{ route('sales.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('sales.update', $sale) }}">
        @csrf @method('PUT')
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Customer *</label>
                <select name="customer_id" class="crud-input" required>
                    @foreach($customers as $c)
                        <option value="{{ $c->id }}" {{ $sale->customer_id==$c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="crud-group">
                <label class="crud-label">Rice Type *</label>
                <input type="text" name="rice_type" class="crud-input" value="{{ old('rice_type', $sale->rice_type) }}" required>
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Quantity (kg) *</label>
                <input type="number" step="0.01" name="quantity_kg" class="crud-input" value="{{ old('quantity_kg', $sale->quantity_kg) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Price per kg (₦) *</label>
                <input type="number" step="0.01" name="price_per_kg" class="crud-input" value="{{ old('price_per_kg', $sale->price_per_kg) }}" required>
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Sale Date *</label>
                <input type="date" name="sale_date" class="crud-input" value="{{ old('sale_date', $sale->sale_date->format('Y-m-d')) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Status *</label>
                <select name="status" class="crud-input" required>
                    <option value="pending" {{ $sale->status==='pending' ? 'selected' : '' }}>⏳ Pending</option>
                    <option value="paid" {{ $sale->status==='paid' ? 'selected' : '' }}>✅ Paid</option>
                    <option value="cancelled" {{ $sale->status==='cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                </select>
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;">{{ old('notes', $sale->notes) }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Update Sale</button>
            <a href="{{ route('sales.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
