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

<div class="data-table-wrap mb-6">
    <div class="data-table-header">
        <span class="data-table-title">Quick Actions</span>
    </div>
    <div class="quick-actions">
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Book Milling Service
        </a>
        <a href="{{ route('chat.index') }}" class="btn btn-ghost">
            <i class="fas fa-comments"></i> Chat with Staff
        </a>
        <a href="{{ route('profile.edit') }}" class="btn btn-ghost">
            <i class="fas fa-user-circle"></i> Update Profile
        </a>
    </div>
</div>

<div class="data-table-wrap">
    <div class="data-table-header">
        <span class="data-table-title">Recent Bookings</span>
        <a href="{{ route('bookings.index') }}" class="btn btn-ghost btn-sm">View All</a>
    </div>
    
    @if(isset($recentBookings) && $recentBookings->count() > 0)
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Machine</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                <tr>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->machine->name ?? 'N/A' }}</td>
                    <td>{{ $booking->quantity_kg }} kg</td>
                    <td>
                        <span class="badge badge-{{ $booking->status === 'completed' ? 'green' : ($booking->status === 'pending' ? 'pale' : 'white') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>{{ $booking->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-calendar-plus"></i>
        <p>No bookings yet. <a href="{{ route('bookings.create') }}" style="color:var(--primary-light);font-weight:500;">Book your first milling service</a> to get started.</p>
    </div>
    @endif
</div>

@endsection

<style>
.mb-6 { margin-bottom: 1.5rem; }
.quick-actions {
    padding: 1rem;
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
}
.empty-state {
    padding: 3rem;
    text-align: center;
    color: var(--text-muted);
    font-size: 0.9rem;
}
.empty-state i {
    font-size: 2rem;
    opacity: 0.25;
    display: block;
    margin-bottom: 0.75rem;
}
.table-responsive { overflow-x: auto; }
.data-table { width: 100%; border-collapse: collapse; }
.data-table th {
    padding: 1rem 1.5rem;
    text-align: left;
    font-size: 0.8125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--primary);
    background: rgba(232, 245, 233, 0.5);
}
.data-table td {
    padding: 1rem 1.5rem;
    font-size: 0.9375rem;
    color: var(--text-main);
    border-bottom: 1px solid var(--border-light);
}
.data-table tbody tr:hover { background: rgba(232, 245, 233, 0.3); }
</style>