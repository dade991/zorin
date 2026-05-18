{{-- FILE: resources/views/paddy-purchases/edit.blade.php --}}
@extends('layouts.app')
@section('title','Edit Purchase')
@section('page-title','Edit Purchase')

@section('content')
<div class="page-header">
    <div><div class="page-title">Edit Purchase #{{ $paddyPurchase->id }}</div></div>
    <a href="{{ route('paddy-purchases.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('paddy-purchases.update', $paddyPurchase) }}">
        @csrf @method('PUT')
        <div class="crud-group">
            <label class="crud-label">Farmer *</label>
            <select name="farmer_id" class="crud-input" required>
                @foreach($farmers as $f)
                    <option value="{{ $f->id }}" {{ $paddyPurchase->farmer_id==$f->id ? 'selected' : '' }}>{{ $f->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Weight (kg) *</label>
                <input type="number" step="0.01" name="weight_kg" class="crud-input" value="{{ old('weight_kg', $paddyPurchase->weight_kg) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Price per kg (₦) *</label>
                <input type="number" step="0.01" name="price_per_kg" class="crud-input" value="{{ old('price_per_kg', $paddyPurchase->price_per_kg) }}" required>
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Purchase Date *</label>
            <input type="date" name="purchase_date" class="crud-input" value="{{ old('purchase_date', $paddyPurchase->purchase_date->format('Y-m-d')) }}" required>
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:80px;resize:none;">{{ old('notes', $paddyPurchase->notes) }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Update Purchase</button>
            <a href="{{ route('paddy-purchases.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
