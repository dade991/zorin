@extends('layouts.app')

@section('title', 'My Bookings — Zorin Rice Milling')
@section('page-title', 'My Bookings')

@section('content')

<div class="dash-welcome mb-6">
    <div class="dash-welcome-text">
        <h2>My Bookings</h2>
        <p>Track all your milling service requests</p>
    </div>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> New Booking
    </a>
</div>

<div class="data-table-wrap">
    <div class="data-table-header">
        <span class="data-table-title">All Bookings</span>
    </div>
    
    @if(isset($bookings) && $bookings->count() > 0)
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Machine</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Booked On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->machine->name ?? 'N/A' }}</td>
                    <td>{{ $booking->quantity_kg }} kg</td>
                    <td>
                        <span class="badge badge-{{ $booking->status === 'completed' ? 'green' : ($booking->status === 'pending' ? 'pale' : ($booking->status === 'processing' ? 'white' : 'danger')) }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>{{ $booking->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="#" class="btn btn-ghost btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="padding:1rem 1.5rem;border-top:1px solid var(--border-light);">
        {{ $bookings->links() }}
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
.btn-sm { padding: 0.5rem 1rem; font-size: 0.875rem; }
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
.badge-danger { background: rgba(220, 38, 38, 0.08); color: #dc2626; }
</style>