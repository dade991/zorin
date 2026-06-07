<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zorin Rice Milling')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">
<script>
    const t = localStorage.getItem('zorin-theme') || 'forest';
    document.documentElement.setAttribute('data-theme', t);
</script>

<div class="dash-layout">

    <!-- SIDEBAR -->
    <aside class="dash-sidebar" id="dash-sidebar" aria-label="Main navigation">
        <div class="dash-sidebar-logo">
            <div class="dash-sidebar-logo-text">ZOR<span>IN</span></div>
            <div class="dash-sidebar-tagline">Rice Milling System</div>
        </div>

        <nav class="dash-sidebar-nav">
            <div class="dash-nav-section">Main</div>
            <a href="{{ route('dashboard') }}"
               class="dash-nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
               aria-current="{{ request()->is('dashboard') ? 'page' : 'false' }}">
                <i class="fas fa-house"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->is_admin ?? false)
                <div class="dash-nav-section">Admin</div>
                <a href="{{ route('admin.sales') }}"
                   class="dash-nav-link {{ request()->is('admin/sales*') ? 'active' : '' }}"
                   aria-current="{{ request()->is('admin/sales*') ? 'page' : 'false' }}">
                    <i class="fas fa-receipt"></i>
                    <span>Sales</span>
                </a>
                <a href="{{ route('admin.customers') }}"
                   class="dash-nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}"
                   aria-current="{{ request()->is('admin/customers*') ? 'page' : 'false' }}">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
                <a href="{{ route('admin.bookings') }}"
                   class="dash-nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}"
                   aria-current="{{ request()->is('admin/bookings*') ? 'page' : 'false' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Bookings</span>
                </a>
                <a href="{{ route('admin.machines') }}"
                   class="dash-nav-link {{ request()->is('admin/machines*') ? 'active' : '' }}"
                   aria-current="{{ request()->is('admin/machines*') ? 'page' : 'false' }}">
                    <i class="fas fa-gears"></i>
                    <span>Machines</span>
                </a>
                <a href="{{ route('admin.notifications') }}"
                   class="dash-nav-link {{ request()->is('admin/notifications*') ? 'active' : '' }}"
                   aria-current="{{ request()->is('admin/notifications*') ? 'page' : 'false' }}">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            @endif

            <div class="dash-nav-section">Account</div>
<a href="{{ route('profile.edit') }}"
   class="dash-nav-link {{ request()->is('settings*') ? 'active' : '' }}"
   aria-current="{{ request()->is('settings*') ? 'page' : 'false' }}">
    <i class="fas fa-cog"></i>
    <span>Settings</span>
</a>
        </nav>

        <div class="dash-sidebar-bottom">
            @auth
            <div class="dash-user-card">
                <div class="dash-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div style="flex:1;min-width:0;">
                    <div class="dash-user-name">{{ Auth::user()->name }}</div>
                    <div class="dash-user-role">User</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="dash-nav-link dash-logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </button>
            </form>
            @endauth
        </div>
    </aside>

    <div class="dash-sidebar-overlay" id="dash-overlay" aria-hidden="true"></div>

    <!-- MAIN -->
    <div class="dash-main">
        <header class="dash-topbar">
            <div class="dash-topbar-left">
                <button class="dash-topbar-btn" id="sidebar-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="dash-sidebar" style="display:none;">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="dash-topbar-title">
                    @yield('page-title', 'Dashboard')
                </span>
            </div>
            <div class="dash-topbar-right">
    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search...">
    </div>
    
    <!-- Notification Dropdown -->
    <div class="notif-dropdown-wrap">
        <button class="dash-topbar-btn" id="notif-toggle" aria-label="Notifications" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="dash-notif-badge" id="notif-badge">3</span>
        </button>
        <div class="notif-dropdown" id="notif-dropdown">
            <div class="notif-dropdown-header">
                <span>Notifications</span>
                <a href="{{ route('notifications.index') }}">Read all</a>
            </div>
            <div class="notif-dropdown-list">
                <div class="notif-item unread">
                    <div class="notif-dot"></div>
                    <div class="notif-content">
                        <div class="notif-title">Booking Confirmed</div>
                        <div class="notif-text">Your milling batch #1024 has been scheduled</div>
                        <div class="notif-time">2 min ago</div>
                    </div>
                </div>
                <div class="notif-item unread">
                    <div class="notif-dot"></div>
                    <div class="notif-content">
                        <div class="notif-title">Machine Ready</div>
                        <div class="notif-text">Rice Mill A is now available for your booking</div>
                        <div class="notif-time">1 hour ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-content">
                        <div class="notif-title">Payment Received</div>
                        <div class="notif-text">Thank you for your payment of ₦45,000</div>
                        <div class="notif-time">Yesterday</div>
                    </div>
                </div>
            </div>
            <div class="notif-dropdown-footer">
                <a href="{{ route('notifications.index') }}" class="btn btn-primary btn-sm">
                    Read More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    @auth
    <a href="{{ route('profile.edit') }}" class="dash-topbar-btn" title="Settings" aria-label="Settings">
        <span class="dash-topbar-initials">
            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
        </span>
    </a>
    @endauth
</div>
        </header>

        <main class="dash-content">
            @if (session('status') || session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('status') ?? session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <div class="alert-error-header">
                    <i class="fas fa-exclamation-triangle"></i> Please fix the following:
                </div>
                <ul class="alert-error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<style>
.logout-form { margin-top: 0.75rem; }
.dash-logout-btn {
    width: 100%;
    background: none;
    border: none;
    cursor: pointer;
    color: rgba(255,255,255,0.45);
    justify-content: flex-start;
}
.dash-logout-btn:hover {
    color: rgba(255,255,255,0.8);
    background: rgba(255,255,255,0.08);
}
.dash-topbar-left {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}
.dash-topbar-initials {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 0.75rem;
    color: var(--primary);
}
.alert-error-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
}
.alert-error-list {
    list-style: disc;
    padding-left: 1.5rem;
    margin-top: 0.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('dash-sidebar');
    const overlay = document.getElementById('dash-overlay');
    const toggle = document.getElementById('sidebar-toggle');
    
    const open = () => { 
        sidebar.classList.add('open'); 
        overlay.classList.add('open'); 
        toggle.setAttribute('aria-expanded', 'true');
    };
    const close = () => { 
        sidebar.classList.remove('open'); 
        overlay.classList.remove('open'); 
        toggle.setAttribute('aria-expanded', 'false');
    };
    
    toggle?.addEventListener('click', () => sidebar.classList.contains('open') ? close() : open());
    overlay?.addEventListener('click', close);
    
    // Auto-dismiss alerts
    document.querySelectorAll('.alert').forEach(a => {
        setTimeout(() => { 
            a.style.transition = 'opacity 0.5s'; 
            a.style.opacity = '0'; 
            setTimeout(() => a.remove(), 500); 
        }, 5000);
    });
});
// Notification dropdown toggle
const notifToggle = document.getElementById('notif-toggle');
const notifDropdown = document.getElementById('notif-dropdown');

notifToggle?.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = notifDropdown.classList.toggle('open');
    notifToggle.setAttribute('aria-expanded', isOpen);
});

// Close when clicking outside
document.addEventListener('click', (e) => {
    if (!notifDropdown?.contains(e.target) && !notifToggle?.contains(e.target)) {
        notifDropdown?.classList.remove('open');
        notifToggle?.setAttribute('aria-expanded', 'false');
    }
});
</script>
</body>
</html>