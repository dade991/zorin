{{-- FILE: resources/views/reports/index.blade.php --}}
@extends('layouts.app')
@section('title','Reports')
@section('page-title','Reports & Analytics')

@section('content')
<div class="page-header">
    <div><div class="page-title">Reports</div><div class="page-subtitle">{{ $from }} to {{ $to }}</div></div>
    <a href="{{ route('reports.export', ['from'=>$from,'to'=>$to]) }}" class="btn btn-outline">⬇ Export CSV</a>
</div>

{{-- Date Filter --}}
<form method="GET" action="{{ route('reports.index') }}" style="display:flex;gap:1rem;align-items:flex-end;flex-wrap:wrap;margin-bottom:1.5rem;">
    <div>
        <label class="crud-label">From</label>
        <input type="date" name="from" class="crud-input" value="{{ $from }}" style="margin-top:.3rem;">
    </div>
    <div>
        <label class="crud-label">To</label>
        <input type="date" name="to" class="crud-input" value="{{ $to }}" style="margin-top:.3rem;">
    </div>
    <button type="submit" class="btn btn-primary">Apply</button>
</form>

{{-- Summary Cards --}}
<div class="dash-stats" style="margin-bottom:1.5rem;">
    <div class="dash-stat-card">
        <div class="stat-card-icon">💰</div>
        <div class="stat-card-value">₦{{ number_format($totalRevenue,0) }}</div>
        <div class="stat-card-label">Total Revenue</div>
    </div>
    <div class="dash-stat-card">
        <div class="stat-card-icon">🛒</div>
        <div class="stat-card-value">₦{{ number_format($totalCost,0) }}</div>
        <div class="stat-card-label">Paddy Cost</div>
    </div>
    <div class="dash-stat-card">
        <div class="stat-card-icon">📈</div>
        <div class="stat-card-value" style="color:{{ $profit >= 0 ? 'var(--p)' : '#EF4444' }}">₦{{ number_format($profit,0) }}</div>
        <div class="stat-card-label">Gross Profit</div>
    </div>
    <div class="dash-stat-card">
        <div class="stat-card-icon">⚙️</div>
        <div class="stat-card-value">{{ number_format($avgEfficiency,1) }}%</div>
        <div class="stat-card-label">Avg Efficiency</div>
    </div>
    <div class="dash-stat-card">
        <div class="stat-card-icon">🌾</div>
        <div class="stat-card-value">{{ number_format($totalPaddy,0) }}</div>
        <div class="stat-card-label">Paddy Bought (kg)</div>
    </div>
    <div class="dash-stat-card">
        <div class="stat-card-icon">🍚</div>
        <div class="stat-card-value">{{ number_format($totalMilled,0) }}</div>
        <div class="stat-card-label">Rice Milled (kg)</div>
    </div>
</div>

{{-- Sales by Day --}}
<div class="dash-card">
    <div class="dash-card-header"><span class="dash-card-title">📅 Daily Revenue</span></div>
    @if($salesByDay->isEmpty())
        <div style="text-align:center;padding:3rem;color:var(--tx-m)">No sales data for this period.</div>
    @else
    <table class="dash-table">
        <thead><tr><th>Date</th><th>Revenue</th></tr></thead>
        <tbody>
            @foreach($salesByDay as $day)
            <tr>
                <td>{{ \Carbon\Carbon::parse($day->day)->format('d M Y') }}</td>
                <td style="font-weight:700;color:var(--p)">₦{{ number_format($day->total,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
