@extends('layouts.app')

@section('title', 'Dashboard — Zorin Rice Milling')
@section('page-title', 'Dashboard')

@section('content')

<div class="dash-welcome">
    <div class="dash-welcome-text">
        <h2>Welcome back, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
        <p>{{ now()->format('l, F j, Y') }}</p>
    </div>
    <span class="dash-welcome-badge">
        Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }}
    </span>
</div>

<div class="dash-stats-grid stagger">
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-calendar-check"></i></div>
        <div class="dash-stat-value">{{ $stats['total_bookings'] ?? 0 }}</div>
        <div class="dash-stat-label">Total Bookings</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="dash-stat-value">{{ $stats['completed_jobs'] ?? 0 }}</div>
        <div class="dash-stat-label">Completed Jobs</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-clock"></i></div>
        <div class="dash-stat-value">{{ $stats['pending_jobs'] ?? 0 }}</div>
        <div class="dash-stat-label">Pending Jobs</div>
    </div>
    <div class="dash-stat-card">
        <div class="dash-stat-icon"><i class="fas fa-bell"></i></div>
        <div class="dash-stat-value">{{ $stats['notifications'] ?? 0 }}</div>
        <div class="dash-stat-label">Notifications</div>
    </div>
</div>

<div class="data-table-wrap" style="margin-bottom:1.5rem;">
    <div class="data-table-header">
        <span class="data-table-title">Quick Actions</span>
    </div>
    <div style="padding:1rem;display:flex;flex-wrap:wrap;gap:0.6rem;">
        <a href="#" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Book Milling Service
        </a>
        <a href="#" class="btn btn-ghost">
            <i class="fas fa-gears"></i> Check Machine Status
        </a>
        <a href="{{ route('profile.edit') }}" class="btn btn-ghost">
            <i class="fas fa-user-circle"></i> Update Profile
        </a>
    </div>
</div>

<div class="data-table-wrap">
    <div class="data-table-header">
        <span class="data-table-title">Recent Activity</span>
    </div>
    <div style="padding:3rem;text-align:center;color:var(--text-muted);font-size:0.9rem;">
        <i class="fas fa-clock" style="font-size:2rem;opacity:0.25;display:block;margin-bottom:0.75rem;"></i>
        No recent activity yet. Book your first milling service to get started.
    </div>
</div>

@endsection