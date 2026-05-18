{{-- FILE: resources/views/milling-batches/show.blade.php --}}
@extends('layouts.app')
@section('title','Batch Details')
@section('page-title','Batch Details')

@section('content')
<div class="page-header">
    <div><div class="page-title">Batch #{{ $millingBatch->id }}</div><div class="page-subtitle">{{ $millingBatch->batch_date->format('d M Y') }}</div></div>
    <div style="display:flex;gap:.75rem">
        <a href="{{ route('milling-batches.edit',$millingBatch) }}" class="btn btn-outline">Edit</a>
        <a href="{{ route('milling-batches.index') }}" class="btn btn-ghost">← Back</a>
    </div>
</div>

<div class="detail-grid" style="max-width:700px">
    <div class="detail-item"><div class="detail-label">Batch Date</div><div class="detail-value">{{ $millingBatch->batch_date->format('d M Y') }}</div></div>
    <div class="detail-item"><div class="detail-label">Rice Type</div><div class="detail-value">{{ $millingBatch->rice_type ?? 'Standard' }}</div></div>
    <div class="detail-item"><div class="detail-label">Paddy Input</div><div class="detail-value">{{ number_format($millingBatch->paddy_input_kg,2) }} kg</div></div>
    <div class="detail-item"><div class="detail-label">Rice Output</div><div class="detail-value">{{ number_format($millingBatch->rice_output_kg,2) }} kg</div></div>
    <div class="detail-item"><div class="detail-label">Waste</div><div class="detail-value">{{ number_format($millingBatch->waste_kg,2) }} kg</div></div>
    <div class="detail-item"><div class="detail-label">Efficiency</div><div class="detail-value" style="color:var(--p);font-weight:700;">{{ $millingBatch->efficiency_pct }}%</div></div>
    @if($millingBatch->notes)
    <div class="detail-item" style="grid-column:1/3"><div class="detail-label">Notes</div><div class="detail-value">{{ $millingBatch->notes }}</div></div>
    @endif
</div>
@endsection
