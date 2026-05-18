@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Quick Actions --}}
<div class="quick-actions" style="margin-bottom:1.5rem;">
    <a href="{{ route('farmers.create') }}" class="qa-btn">
        <span class="qa-icon">👨‍🌾</span>
        <span class="qa-label">Add Farmer</span>
    </a>
    <a href="{{ route('paddy-purchases.create') }}" class="qa-btn">
        <span class="qa-icon">🛒</span>
        <span class="qa-label">Record Purchase</span>
    </a>
    <a href="{{ route('milling-batches.create') }}" class="qa-btn">
        <span class="qa-icon">⚙️</span>
        <span class="qa-label">New Batch</span>
    </a>
    <a href="{{ route('sales.create') }}" class="qa-btn">
        <span class="qa-icon">💰</span>
        <span class="qa-label">New Sale</span>
    </a>
    <a href="{{ route('reports.index') }}" class="qa-btn">
        <span class="qa-icon">📈</span>
        <span class="qa-label">View Reports</span>
    </a>
</div>

{{-- Stat Cards --}}
<div class="dash-stats">
    <div class="dash-stat-card" style="animation-delay:.05s">
        <div class="stat-card-icon">👨‍🌾</div>
        <div class="stat-card-value">{{ $stats['farmers'] }}</div>
        <div class="stat-card-label">Total Farmers</div>
        <div class="stat-card-change up">↑ Active records</div>
    </div>
    <div class="dash-stat-card" style="animation-delay:.1s">
        <div class="stat-card-icon">🛒</div>
        <div class="stat-card-value">{{ $stats['purchases'] }}</div>
        <div class="stat-card-label">Paddy Purchases</div>
        <div class="stat-card-change neutral">All time</div>
    </div>
    <div class="dash-stat-card" style="animation-delay:.15s">
        <div class="stat-card-icon">⚙️</div>
        <div class="stat-card-value">{{ $stats['milling'] }}</div>
        <div class="stat-card-label">Milling Batches</div>
        <div class="stat-card-change neutral">All time</div>
    </div>
    <div class="dash-stat-card" style="animation-delay:.2s">
        <div class="stat-card-icon">💰</div>
        <div class="stat-card-value">₦{{ number_format($stats['sales_total'], 0) }}</div>
        <div class="stat-card-label">Total Revenue</div>
        <div class="stat-card-change up">↑ Paid sales</div>
    </div>
    <div class="dash-stat-card" style="animation-delay:.25s">
        <div class="stat-card-icon">🤝</div>
        <div class="stat-card-value">{{ $stats['customers'] }}</div>
        <div class="stat-card-label">Customers</div>
        <div class="stat-card-change neutral">Registered</div>
    </div>
    <div class="dash-stat-card" style="animation-delay:.3s">
        <div class="stat-card-icon">⏳</div>
        <div class="stat-card-value">{{ $stats['pending_sales'] }}</div>
        <div class="stat-card-label">Pending Sales</div>
        <div class="stat-card-change {{ $stats['pending_sales'] > 0 ? 'up' : 'neutral' }}">
            {{ $stats['pending_sales'] > 0 ? '⚠ Needs attention' : '✓ All clear' }}
        </div>
    </div>
</div>

{{-- Monthly Revenue Mini Chart --}}
<div class="dash-card" style="margin-bottom:1.5rem;">
    <div class="dash-card-header">
        <span class="dash-card-title">📊 Revenue — Last 6 Months</span>
        <a href="{{ route('reports.index') }}" class="dash-card-link">Full Report →</a>
    </div>
    <div style="padding:1.5rem;display:flex;align-items:flex-end;gap:.75rem;height:130px;">
        @php $max = collect($monthlyRevenue)->max('amount') ?: 1; @endphp
        @foreach($monthlyRevenue as $m)
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:.4rem;height:100%;">
            <div style="flex:1;width:100%;display:flex;align-items:flex-end;">
                <div style="width:100%;height:{{ max(6, round(($m['amount']/$max)*100)) }}%;background:var(--p);border-radius:6px 6px 0 0;transition:height .6s ease;min-height:6px;" title="₦{{ number_format($m['amount']) }}"></div>
            </div>
            <div style="font-size:.68rem;color:var(--tx-m);font-weight:600;">{{ $m['month'] }}</div>
        </div>
        @endforeach
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;flex-wrap:wrap;">

    {{-- Recent Farmers --}}
    <div class="dash-card">
        <div class="dash-card-header">
            <span class="dash-card-title">👨‍🌾 Recent Farmers</span>
            <a href="{{ route('farmers.index') }}" class="dash-card-link">View All →</a>
        </div>
        <table class="dash-table">
            <thead><tr><th>Name</th><th>Village</th><th>Added</th></tr></thead>
            <tbody>
                @forelse($recentFarmers as $f)
                <tr>
                    <td><a href="{{ route('farmers.show', $f) }}" style="color:var(--p);font-weight:600;">{{ $f->name }}</a></td>
                    <td>{{ $f->village ?? '—' }}</td>
                    <td style="color:var(--tx-m);font-size:.8rem;">{{ $f->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:var(--tx-m);padding:2rem;">No farmers yet. <a href="{{ route('farmers.create') }}" style="color:var(--p);">Add one →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Recent Sales --}}
    <div class="dash-card">
        <div class="dash-card-header">
            <span class="dash-card-title">💰 Recent Sales</span>
            <a href="{{ route('sales.index') }}" class="dash-card-link">View All →</a>
        </div>
        <table class="dash-table">
            <thead><tr><th>Customer</th><th>Amount</th><th>Status</th></tr></thead>
            <tbody>
                @forelse($recentSales as $s)
                <tr>
                    <td>{{ $s->customer->name ?? '—' }}</td>
                    <td style="font-weight:600;">₦{{ number_format($s->total_amount) }}</td>
                    <td>
                        <span class="tbadge {{ $s->status === 'paid' ? 'tbadge-green' : ($s->status === 'pending' ? 'tbadge-yellow' : 'tbadge-blue') }}">
                            {{ ucfirst($s->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:var(--tx-m);padding:2rem;">No sales yet. <a href="{{ route('sales.create') }}" style="color:var(--p);">Record one →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
