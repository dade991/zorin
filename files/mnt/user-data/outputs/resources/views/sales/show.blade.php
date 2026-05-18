{{-- FILE: resources/views/sales/show.blade.php --}}
@extends('layouts.app')
@section('title','Sale Details')
@section('page-title','Sale Details')

@section('content')
<div class="page-header">
    <div><div class="page-title">Sale #{{ $sale->id }}</div><div class="page-subtitle">{{ $sale->sale_date->format('d M Y') }}</div></div>
    <div style="display:flex;gap:.75rem">
        <a href="{{ route('sales.edit',$sale) }}" class="btn btn-outline">Edit</a>
        <a href="{{ route('sales.index') }}" class="btn btn-ghost">← Back</a>
    </div>
</div>

<div class="detail-grid" style="max-width:700px">
    <div class="detail-item"><div class="detail-label">Customer</div><div class="detail-value">{{ $sale->customer->name ?? '—' }}</div></div>
    <div class="detail-item"><div class="detail-label">Rice Type</div><div class="detail-value">{{ $sale->rice_type }}</div></div>
    <div class="detail-item"><div class="detail-label">Quantity</div><div class="detail-value">{{ number_format($sale->quantity_kg,2) }} kg</div></div>
    <div class="detail-item"><div class="detail-label">Price per kg</div><div class="detail-value">₦{{ number_format($sale->price_per_kg,2) }}</div></div>
    <div class="detail-item"><div class="detail-label">Total Amount</div><div class="detail-value" style="color:var(--p);font-weight:700;font-size:1.1rem">₦{{ number_format($sale->total_amount,2) }}</div></div>
    <div class="detail-item"><div class="detail-label">Status</div><div class="detail-value"><span class="tbadge {{ $sale->status==='paid' ? 'tbadge-green' : ($sale->status==='pending' ? 'tbadge-yellow' : 'tbadge-blue') }}">{{ ucfirst($sale->status) }}</span></div></div>
    <div class="detail-item"><div class="detail-label">Date</div><div class="detail-value">{{ $sale->sale_date->format('d M Y') }}</div></div>
    @if($sale->notes)
    <div class="detail-item" style="grid-column:1/3"><div class="detail-label">Notes</div><div class="detail-value">{{ $sale->notes }}</div></div>
    @endif
</div>
@endsection
