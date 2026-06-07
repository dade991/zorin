@extends('layouts.app')

@section('title', 'Notifications — Zorin Rice Milling')
@section('page-title', 'Notifications')

@section('content')

<div class="dash-welcome mb-6">
    <div class="dash-welcome-text">
        <h2>Your Notifications</h2>
        <p>Stay updated on your milling activities</p>
    </div>
    @if($notifications->where('is_read', false)->count() > 0)
    <form action="{{ route('notifications.read-all') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-ghost">
            <i class="fas fa-check-double"></i> Mark all read
        </button>
    </form>
    @endif
</div>

<div class="data-table-wrap">
    <div class="data-table-header">
        <span class="data-table-title">All Notifications</span>
        <span class="badge badge-pale">{{ $notifications->total() }} total</span>
    </div>
    
    @if($notifications->count() > 0)
    <div class="notif-list">
        @foreach($notifications as $notif)
        <div class="notif-list-item {{ $notif->is_read ? '' : 'unread' }}">
            <div class="notif-list-dot"></div>
            <div class="notif-list-content">
                <div class="notif-list-header">
                    <span class="notif-list-title">{{ $notif->title }}</span>
                    <span class="notif-list-time">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
                <p class="notif-list-text">{{ $notif->message }}</p>
                @if($notif->link_url)
                <a href="{{ route('notifications.read', $notif->id) }}" class="notif-list-link">
                    View details <i class="fas fa-arrow-right"></i>
                </a>
                @endif
            </div>
            @if(!$notif->is_read)
            <span class="badge badge-green">New</span>
            @endif
        </div>
        @endforeach
    </div>
    
    <div style="padding:1rem 1.5rem;border-top:1px solid var(--border-light);">
        {{ $notifications->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-bell-slash"></i>
        <p>No notifications yet. We'll notify you when something happens!</p>
    </div>
    @endif
</div>

@endsection

<style>
.notif-list { display: flex; flex-direction: column; }
.notif-list-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border-light);
    transition: background 0.2s;
}
.notif-list-item:hover { background: rgba(26, 74, 46, 0.02); }
.notif-list-item.unread { background: rgba(46, 125, 50, 0.03); }
.notif-list-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--border-light);
    margin-top: 0.375rem;
    flex-shrink: 0;
}
.notif-list-item.unread .notif-list-dot {
    background: var(--primary-light);
    box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.15);
}
.notif-list-content { flex: 1; min-width: 0; }
.notif-list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.375rem;
}
.notif-list-title { font-weight: 600; color: var(--text-main); }
.notif-list-time { font-size: 0.8125rem; color: var(--text-light); flex-shrink: 0; }
.notif-list-text { font-size: 0.9375rem; color: var(--text-muted); margin-bottom: 0.5rem; }
.notif-list-link {
    font-size: 0.875rem;
    color: var(--primary-light);
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}
.notif-list-link:hover { color: var(--primary); }
</style>