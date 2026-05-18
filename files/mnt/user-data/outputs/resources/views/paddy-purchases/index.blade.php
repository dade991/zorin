{{-- FILE: resources/views/paddy-purchases/index.blade.php --}}
@extends('layouts.app')
@section('title','Paddy Purchases')
@section('page-title','Paddy Purchases')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Paddy Purchases</div>
        <div class="page-subtitle">{{ $purchases->total() }} records total</div>
    </div>
    <a href="{{ route('paddy-purchases.create') }}" class="btn btn-primary">+ Record Purchase</a>
</div>

<div class="dash-card">
    <table class="dash-table">
        <thead>
            <tr><th>#</th><th>Farmer</th><th>Date</th><th>Weight (kg)</th><th>Price/kg</th><th>Total</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($purchases as $p)
            <tr>
                <td style="color:var(--tx-m)">{{ $p->id }}</td>
                <td style="font-weight:600">{{ $p->farmer->name ?? '—' }}</td>
                <td>{{ $p->purchase_date->format('d M Y') }}</td>
                <td>{{ number_format($p->weight_kg,1) }}</td>
                <td>₦{{ number_format($p->price_per_kg,2) }}</td>
                <td style="font-weight:700;color:var(--p)">₦{{ number_format($p->total_cost,2) }}</td>
                <td>
                    <div style="display:flex;gap:.5rem">
                        <a href="{{ route('paddy-purchases.edit',$p) }}" class="btn btn-sm btn-ghost">Edit</a>
                        <form method="POST" action="{{ route('paddy-purchases.destroy',$p) }}" onsubmit="return confirm('Delete this purchase?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:3rem;color:var(--tx-m)">No purchases recorded yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:1rem 1.5rem">{{ $purchases->links() }}</div>
</div>
@endsection
