{{-- FILE: resources/views/sales/index.blade.php --}}
@extends('layouts.app')
@section('title','Sales')
@section('page-title','Sales')

@section('content')
<div class="page-header">
    <div><div class="page-title">Sales</div><div class="page-subtitle">{{ $sales->total() }} sales recorded</div></div>
    <a href="{{ route('sales.create') }}" class="btn btn-primary">+ New Sale</a>
</div>

<div class="dash-card">
    <table class="dash-table">
        <thead><tr><th>Date</th><th>Customer</th><th>Rice Type</th><th>Qty (kg)</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($sales as $s)
            <tr>
                <td>{{ $s->sale_date->format('d M Y') }}</td>
                <td style="font-weight:600">{{ $s->customer->name ?? '—' }}</td>
                <td>{{ $s->rice_type }}</td>
                <td>{{ number_format($s->quantity_kg,1) }}</td>
                <td style="font-weight:700;color:var(--p)">₦{{ number_format($s->total_amount,2) }}</td>
                <td><span class="tbadge {{ $s->status==='paid' ? 'tbadge-green' : ($s->status==='pending' ? 'tbadge-yellow' : 'tbadge-blue') }}">{{ ucfirst($s->status) }}</span></td>
                <td>
                    <div style="display:flex;gap:.5rem">
                        <a href="{{ route('sales.show',$s) }}" class="btn btn-sm btn-outline">View</a>
                        <a href="{{ route('sales.edit',$s) }}" class="btn btn-sm btn-ghost">Edit</a>
                        <form method="POST" action="{{ route('sales.destroy',$s) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:3rem;color:var(--tx-m)">No sales yet. <a href="{{ route('sales.create') }}" style="color:var(--p)">Record your first sale →</a></td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:1rem 1.5rem">{{ $sales->links() }}</div>
</div>
@endsection
