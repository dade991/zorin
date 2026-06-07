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
    <aside class="dash-sidebar" id="dash-sidebar">
        <div class="dash-sidebar-logo">
            <div class="dash-sidebar-logo-text">ZOR<span>IN</span></div>
            <div class="dash-sidebar-tagline">Rice Milling System</div>
        </div>

        <nav class="dash-sidebar-nav">
            <div class="dash-nav-section">Main</div>
            <a href="{{ route('dashboard') }}"
               class="dash-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->is_admin ?? false)
                <div class="dash-nav-section">Admin</div>
                <a href="{{ route('admin.sales') }}"
                   class="dash-nav-link {{ request()->is('admin/sales*') ? 'active' : '' }}">
                    <i class="fas fa-receipt"></i>
                    <span>Sales</span>
                </a>
                <a href="{{ route('admin.customers') }}"
                   class="dash-nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
                <a href="{{ route('admin.bookings') }}"
                   class="dash-nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Bookings</span>
                </a>
                <a href="{{ route('admin.machines') }}"
                   class="dash-nav-link {{ request()->is('admin/machines*') ? 'active' : '' }}">
                    <i class="fas fa-gears"></i>
                    <span>Machines</span>
                </a>
                <a href="{{ route('admin.notifications') }}"
                   class="dash-nav-link {{ request()->is('admin/notifications*') ? 'active' : '' }}">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            @endif

            <div class="dash-nav-section">Account</div>
            <a href="{{ route('profile.edit') }}"
               class="dash-nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i>
                <span>Profile</span>
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
            <form method="POST" action="{{ route('logout') }}" style="margin-top:0.75rem;">
                @csrf
                <button type="submit" class="dash-nav-link" style="width:100%;background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.45);justify-content:flex-start;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </button>
            </form>
            @endauth
        </div>
    </aside>

    <div class="dash-sidebar-overlay" id="dash-overlay"></div>

    <!-- MAIN -->
    <div class="dash-main">
        <header class="dash-topbar">
            <div style="display:flex;align-items:center;gap:0.75rem;">
                <button class="dash-topbar-btn" id="sidebar-toggle" style="display:none;" aria-label="Open menu">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="dash-topbar-title">
                    @yield('page-title', 'Dashboard')
                </span>
            </div>
            <div class="dash-topbar-right">
                <div class="search-box" style="width:220px;">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <button class="dash-topbar-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="dash-notif-badge">0</span>
                </button>
                @auth
                <a href="{{ route('profile.edit') }}" class="dash-topbar-btn" title="Profile">
                    <span style="font-family:'Syne',sans-serif;font-weight:800;font-size:0.75rem;color:var(--primary);">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </span>
                </a>
                @endauth
            </div>
        </header>

        <main class="dash-content">
            @if (session('status') || session('success'))
            <div class="alert alert-success" style="margin-bottom:1.5rem;">
                <i class="fas fa-check-circle"></i>
                {{ session('status') ?? session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-error" style="margin-bottom:1.5rem;">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-error" style="margin-bottom:1.5rem;flex-direction:column;align-items:flex-start;">
                <div style="display:flex;align-items:center;gap:0.5rem;font-weight:600;">
                    <i class="fas fa-exclamation-triangle"></i> Please fix the following:
                </div>
                <ul style="list-style:disc;padding-left:1.5rem;margin-top:0.5rem;display:flex;flex-direction:column;gap:0.2rem;">
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
.dash-sidebar-overlay {
    display: none; position: fixed; inset: 0;
    background: rgba(0,0,0,0.45); z-index: 40;
    opacity: 0; transition: opacity 0.3s ease;
    backdrop-filter: blur(4px);
}
.dash-sidebar-overlay.open { opacity: 1; display: block; }
@media (max-width:1024px) {
    #sidebar-toggle { display:flex !important; }
    .dash-sidebar-overlay { display: block; pointer-events: none; }
    .dash-sidebar-overlay.open { pointer-events: auto; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('dash-sidebar');
    const overlay = document.getElementById('dash-overlay');
    const toggle = document.getElementById('sidebar-toggle');
    const open = () => { sidebar.classList.add('open'); overlay.classList.add('open'); };
    const close = () => { sidebar.classList.remove('open'); overlay.classList.remove('open'); };
    toggle?.addEventListener('click', () => sidebar.classList.contains('open') ? close() : open());
    overlay?.addEventListener('click', close);
    document.querySelectorAll('.alert').forEach(a => {
        setTimeout(() => { a.style.transition='opacity 0.5s'; a.style.opacity='0'; setTimeout(()=>a.remove(),500); }, 5000);
    });
});
</script>
</body>
</html>