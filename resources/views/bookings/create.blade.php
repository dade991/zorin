@extends('layouts.app')

@section('title', 'Book Milling Service — Zorin Rice Milling')
@section('page-title', 'Book Milling Service')

@section('content')

<div class="dash-welcome mb-6">
    <div class="dash-welcome-text">
        <h2>Book a Milling Service</h2>
        <p>Schedule your paddy processing with our machines</p>
    </div>
</div>

<div class="profile-grid">
    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-gears"></i> Select Machine</span>
        </div>
        <div class="data-table-body" style="padding:1.5rem;">
            <form method="POST" action="{{ route('bookings.store') }}" class="form-stack">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Available Machines</label>
                    <div class="machine-grid">
                        @forelse($machines as $machine)
                        <label class="machine-card">
                            <input type="radio" name="machine_id" value="{{ $machine->id }}" required
                                   class="machine-radio" {{ old('machine_id') == $machine->id ? 'checked' : '' }}>
                            <div class="machine-info">
                                <div class="machine-name">{{ $machine->name }}</div>
                                <div class="machine-meta">{{ $machine->type }} • {{ $machine->capacity_kg_per_hour }} kg/hr</div>
                                <div class="machine-location"><i class="fas fa-location-dot"></i> {{ $machine->location }}</div>
                            </div>
                            <span class="badge badge-green">Available</span>
                        </label>
                        @empty
                        <div class="empty-state" style="padding:2rem;">
                            <i class="fas fa-gears"></i>
                            <p>No machines available right now. Please check back later.</p>
                        </div>
                        @endforelse
                    </div>
                    @error('machine_id')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity_kg" class="form-label">Quantity (kg)</label>
                    <input id="quantity_kg" type="number" name="quantity_kg" value="{{ old('quantity_kg') }}" 
                           class="form-input @error('quantity_kg') is-invalid @enderror" 
                           placeholder="e.g. 500" min="10" max="10000" required>
                    @error('quantity_kg')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="notes" class="form-label">Special Instructions (Optional)</label>
                    <textarea id="notes" name="notes" rows="3" 
                              class="form-input @error('notes') is-invalid @enderror" 
                              placeholder="Any specific requirements...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-paper-plane"></i> Submit Booking Request
                </button>
            </form>
        </div>
    </div>

    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-info-circle"></i> Booking Info</span>
        </div>
        <div class="data-table-body" style="padding:1.5rem;">
            <div class="info-list">
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <div class="info-title">Processing Time</div>
                        <div class="info-text">Usually 2-4 hours depending on quantity</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <div>
                        <div class="info-title">Pricing</div>
                        <div class="info-text">₦150 per kg for standard milling</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-shield-halved"></i>
                    <div>
                        <div class="info-title">Quality Guarantee</div>
                        <div class="info-text">ISO 9001:2015 certified processes</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-truck"></i>
                    <div>
                        <div class="info-title">Pickup / Delivery</div>
                        <div class="info-text">Collect within 24hrs or arrange delivery</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
.machine-grid {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}
.machine-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 2px solid var(--border-light);
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s;
}
.machine-card:hover {
    border-color: var(--primary-light);
    background: rgba(46, 125, 50, 0.03);
}
.machine-radio {
    width: 20px;
    height: 20px;
    accent-color: var(--primary);
    flex-shrink: 0;
}
.machine-info { flex: 1; }
.machine-name { font-weight: 600; color: var(--text-main); }
.machine-meta { font-size: 0.8125rem; color: var(--text-muted); margin-top: 0.125rem; }
.machine-location { font-size: 0.75rem; color: var(--text-light); margin-top: 0.25rem; }
.info-list { display: flex; flex-direction: column; gap: 1.25rem; }
.info-item {
    display: flex;
    align-items: flex-start;
    gap: 0.875rem;
}
.info-item i {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--primary-pale);
    color: var(--primary-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    flex-shrink: 0;
}
.info-title { font-weight: 600; color: var(--text-main); font-size: 0.9375rem; }
.info-text { font-size: 0.875rem; color: var(--text-muted); margin-top: 0.125rem; }
</style>