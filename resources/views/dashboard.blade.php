@extends('layouts.app')

@section('title', 'Dashboard — Zorin Rice Milling')
@section('page-title', 'Dashboard')

@section('content')

{{-- Welcome Band --}}
<div class="dash-welcome">
    <div class="dash-welcome-text">
        <h2>Welcome back, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
        <p>Here's what's happening at the mill today — {{ now()->format('l, F j, Y') }}</p>
    </div>
    <span class="dash-welcome-badge">
        Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }}
    </span>
</div>

{{-- KPI Stats --}}
<div class="dash-stats-grid stagger">
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-user-tie"></i></div>
        <div class="dash-stat-value">{{ $stats['farmers'] }}</div>
        <div class="dash-stat-label">Registered Farmers</div>
        <div class="dash-stat-change up"><i class="fas fa-arrow-up"></i> Active this season</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-shopping-basket"></i></div>
        <div class="dash-stat-value">{{ $stats['purchases'] }}<small style="font-size:1rem;font-weight:500;"> T</small></div>
        <div class="dash-stat-label">Paddy Purchased</div>
        <div class="dash-stat-change up"><i class="fas fa-arrow-up"></i> 12% from last month</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-industry"></i></div>
        <div class="dash-stat-value">{{ $stats['milling'] }}</div>
        <div class="dash-stat-label">Milling Batches</div>
        <div class="dash-stat-change up"><i class="fas fa-arrow-up"></i> 8% from last month</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-naira-sign"></i></div>
        <div class="dash-stat-value">₦{{ number_format($stats['sales_total'] ?? 0, 0) }}</div>
        <div class="dash-stat-label">Monthly Sales Revenue</div>
        <div class="dash-stat-change up"><i class="fas fa-arrow-up"></i> 15% from last month</div>
    </div>
</div>

{{-- Recent Activity & Quick Actions --}}
<div style="display:grid;grid-template-columns:1fr 340px;gap:1.5rem;margin-bottom:2rem;" class="dash-two-col">

    {{-- Recent Activity --}}
    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title">Recent Activity</span>
            <span style="font-size:0.78rem;color:var(--text-muted);">Last 10 events</span>
        </div>
        <div>
            @forelse($recentActivities as $activity)
            <div class="dash-activity-item">
                <div class="dash-activity-icon"><i class="{{ $activity->icon ?? 'fas fa-circle' }}"></i></div>
                <div style="flex:1;min-width:0;">
                    <div class="dash-activity-title">{{ $activity->title }}</div>
                    <div class="dash-activity-desc">{{ $activity->description }}</div>
                    <div class="dash-activity-time">{{ $activity->time }}</div>
                </div>
            </div>
            @empty
            <div style="padding:3rem;text-align:center;color:var(--text-muted);font-size:0.9rem;">
                <i class="fas fa-clock" style="font-size:2rem;opacity:0.25;display:block;margin-bottom:0.75rem;"></i>
                No recent activity yet
            </div>
            @endforelse
        </div>
    </div>

    {{-- Quick Actions --}}
    <div>
        <div class="data-table-wrap" style="margin-bottom:1.25rem;">
            <div class="data-table-header">
                <span class="data-table-title">Quick Actions</span>
            </div>
            <div style="padding:1rem;display:flex;flex-direction:column;gap:0.6rem;">
                <a href="{{ route('farmers.create') }}" class="btn btn-primary" style="justify-content:flex-start;border-radius:var(--r-sm);">
                    <i class="fas fa-user-plus"></i> Add New Farmer
                </a>
                <a href="{{ route('paddy-purchases.create') }}" class="btn btn-secondary" style="justify-content:flex-start;border-radius:var(--r-sm);">
                    <i class="fas fa-plus-circle"></i> Record Purchase
                </a>
                <a href="{{ route('milling-batches.create') }}" class="btn btn-ghost" style="justify-content:flex-start;border-radius:var(--r-sm);">
                    <i class="fas fa-industry"></i> New Milling Batch
                </a>
                <a href="{{ route('sales.create') }}" class="btn btn-ghost" style="justify-content:flex-start;border-radius:var(--r-sm);">
                    <i class="fas fa-receipt"></i> Create Sale Invoice
                </a>
            </div>
        </div>

        {{-- Mini stats --}}
        <div class="data-table-wrap">
            <div class="data-table-header">
                <span class="data-table-title">Inventory Snapshot</span>
            </div>
            <div style="padding:1rem 1.5rem;display:flex;flex-direction:column;gap:0.85rem;">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:0.84rem;color:var(--text-muted);">Total Rice Stock</span>
                    <span class="badge badge-green">{{ $stats['inventory_stock'] ?? '—' }} MT</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:0.84rem;color:var(--text-muted);">Pending Sales</span>
                    <span class="badge badge-yellow">{{ $stats['pending_sales'] ?? 0 }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:0.84rem;color:var(--text-muted);">Low Stock Items</span>
                    <span class="badge badge-red">{{ $stats['low_stock'] ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Recent Farmers --}}
<div class="data-table-wrap" style="margin-bottom:1.5rem;">
    <div class="data-table-header">
        <span class="data-table-title">Recent Farmers</span>
        <a href="{{ route('farmers.index') }}" class="btn btn-ghost" style="padding:0.4rem 1rem;font-size:0.8rem;">
            View All <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    @include('farmers.partials._table')
</div>

{{-- Recent Purchases --}}
<div class="data-table-wrap">
    <div class="data-table-header">
        <span class="data-table-title">Recent Paddy Purchases</span>
        <a href="{{ route('paddy-purchases.index') }}" class="btn btn-ghost" style="padding:0.4rem 1rem;font-size:0.8rem;">
            View All <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    @include('paddy-purchases.partials._table')
</div>

<style>
@media (max-width: 900px) {
    .dash-two-col { grid-template-columns: 1fr !important; }
}
</style>

@endsection