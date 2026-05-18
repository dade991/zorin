{{-- FILE: resources/views/customers/show.blade.php --}}
@extends('layouts.app')
@section('title','Customer')
@section('page-title','Customer Details')

@section('content')
<div class="page-header">
    <div><div class="page-title">{{ $customer->name }}</div></div>
    <div style="display:flex;gap:.75rem">
        <a href="{{ route('customers.edit',$customer) }}" class="btn btn-outline">Edit</a>
        <a href="{{ route('customers.index') }}" class="btn btn-ghost">← Back</a>
    </div>
</div>
<div class="detail-grid" style="max-width:700px">
    <div class="detail-item"><div class="detail-label">Name</div><div class="detail-value">{{ $customer->name }}</div></div>
    <div class="detail-item"><div class="detail-label">Phone</div><div class="detail-value">{{ $customer->phone ?? '—' }}</div></div>
    <div class="detail-item"><div class="detail-label">Email</div><div class="detail-value">{{ $customer->email ?? '—' }}</div></div>
    <div class="detail-item"><div class="detail-label">Total Sales</div><div class="detail-value">{{ $sales->count() }}</div></div>
    @if($customer->address)
    <div class="detail-item" style="grid-column:1/3"><div class="detail-label">Address</div><div class="detail-value">{{ $customer->address }}</div></div>
    @endif
</div>

<div class="dash-card" style="max-width:800px;margin-top:1.5rem">
    <div class="dash-card-header"><span class="dash-card-title">Purchase History</span></div>
    <table class="dash-table">
        <thead><tr><th>Date</th><th>Rice Type</th><th>Qty</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($sales as $s)
            <tr>
                <td>{{ $s->sale_date->format('d M Y') }}</td>
                <td>{{ $s->rice_type }}</td>
                <td>{{ number_format($s->quantity_kg,1) }} kg</td>
                <td>₦{{ number_format($s->total_amount,2) }}</td>
                <td><span class="tbadge {{ $s->status==='paid' ? 'tbadge-green' : ($s->status==='pending' ? 'tbadge-yellow' : 'tbadge-blue') }}">{{ ucfirst($s->status) }}</span></td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--tx-m)">No purchases yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
