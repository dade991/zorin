{{-- FILE: resources/views/farmers/show.blade.php --}}
@extends('layouts.app')
@section('title', $farmer->name)
@section('page-title','Farmer Details')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $farmer->name }}</div>
        <div class="page-subtitle">Farmer Record #{{ $farmer->id }}</div>
    </div>
    <div style="display:flex;gap:.75rem;">
        <a href="{{ route('farmers.edit', $farmer) }}" class="btn btn-outline">Edit</a>
        <a href="{{ route('farmers.index') }}" class="btn btn-ghost">← Back</a>
    </div>
</div>

<div class="detail-grid" style="max-width:800px;">
    <div class="detail-item">
        <div class="detail-label">Full Name</div>
        <div class="detail-value">{{ $farmer->name }}</div>
    </div>
    <div class="detail-item">
        <div class="detail-label">Phone</div>
        <div class="detail-value">{{ $farmer->phone ?? '—' }}</div>
    </div>
    <div class="detail-item">
        <div class="detail-label">Village</div>
        <div class="detail-value">{{ $farmer->village ?? '—' }}</div>
    </div>
    <div class="detail-item">
        <div class="detail-label">State</div>
        <div class="detail-value">{{ $farmer->state ?? '—' }}</div>
    </div>
    <div class="detail-item">
        <div class="detail-label">ID / NIN</div>
        <div class="detail-value">{{ $farmer->id_number ?? '—' }}</div>
    </div>
    <div class="detail-item">
        <div class="detail-label">Registered</div>
        <div class="detail-value">{{ $farmer->created_at->format('d M Y') }}</div>
    </div>
    @if($farmer->notes)
    <div class="detail-item" style="grid-column:1/3;">
        <div class="detail-label">Notes</div>
        <div class="detail-value">{{ $farmer->notes }}</div>
    </div>
    @endif
</div>

<div class="dash-card" style="max-width:800px;margin-top:1.5rem;">
    <div class="dash-card-header">
        <span class="dash-card-title">🛒 Purchase History</span>
        <a href="{{ route('paddy-purchases.create') }}" class="dash-card-link">+ New Purchase</a>
    </div>
    <table class="dash-table">
        <thead><tr><th>Date</th><th>Weight (kg)</th><th>Price/kg</th><th>Total</th></tr></thead>
        <tbody>
            @forelse($purchases as $p)
            <tr>
                <td>{{ $p->purchase_date->format('d M Y') }}</td>
                <td>{{ number_format($p->weight_kg, 1) }} kg</td>
                <td>₦{{ number_format($p->price_per_kg, 2) }}</td>
                <td style="font-weight:600;">₦{{ number_format($p->total_cost, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:2rem;color:var(--tx-m);">No purchases yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
