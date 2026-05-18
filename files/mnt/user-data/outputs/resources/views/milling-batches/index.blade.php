{{-- ════════════════════════════════════════
    FILE: resources/views/milling-batches/index.blade.php
════════════════════════════════════════ --}}
@extends('layouts.app')
@section('title','Milling Batches')
@section('page-title','Milling Batches')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Milling Batches</div>
        <div class="page-subtitle">{{ $batches->total() }} batches recorded</div>
    </div>
    <a href="{{ route('milling-batches.create') }}" class="btn btn-primary">+ New Batch</a>
</div>

<div class="dash-card">
    <table class="dash-table">
        <thead><tr><th>Date</th><th>Rice Type</th><th>Input (kg)</th><th>Output (kg)</th><th>Efficiency</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($batches as $b)
            <tr>
                <td>{{ $b->batch_date->format('d M Y') }}</td>
                <td>{{ $b->rice_type ?? 'Standard' }}</td>
                <td>{{ number_format($b->paddy_input_kg,1) }}</td>
                <td>{{ number_format($b->rice_output_kg,1) }}</td>
                <td>
                    <span class="tbadge {{ $b->efficiency_pct >= 65 ? 'tbadge-green' : 'tbadge-yellow' }}">
                        {{ $b->efficiency_pct }}%
                    </span>
                </td>
                <td>
                    <div style="display:flex;gap:.5rem">
                        <a href="{{ route('milling-batches.show',$b) }}" class="btn btn-sm btn-outline">View</a>
                        <a href="{{ route('milling-batches.edit',$b) }}" class="btn btn-sm btn-ghost">Edit</a>
                        <form method="POST" action="{{ route('milling-batches.destroy',$b) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:3rem;color:var(--tx-m)">No batches yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:1rem 1.5rem">{{ $batches->links() }}</div>
</div>
@endsection
