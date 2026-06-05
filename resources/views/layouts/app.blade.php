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
    // Apply saved theme before first paint to avoid flash
    const t = localStorage.getItem('zorin-theme') || 'forest';
    document.documentElement.setAttribute('data-theme', t);
</script>

<div class="dash-layout">

    <!-- ══════════════ SIDEBAR ══════════════ -->
    <aside class="dash-sidebar" id="dash-sidebar">

        <!-- Logo -->
        <div class="dash-sidebar-logo">
            <div class="dash-sidebar-logo-text">ZOR<span>IN</span></div>
            <div class="dash-sidebar-tagline">Rice Milling System</div>
        </div>

        <!-- Navigation -->
        <nav class="dash-sidebar-nav">

            <div class="dash-nav-section">Main</div>

            <a href="{{ route('dashboard') }}"
               class="dash-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                <span>Dashboard</span>
            </a>

            <div class="dash-nav-section">Operations</div>

            <a href="{{ route('farmers.index') }}"
               class="dash-nav-link {{ request()->is('farmers*') ? 'active' : '' }}">
                <i class="fas fa-user-tie"></i>
                <span>Farmers</span>
            </a>

            <a href="{{ route('paddy-purchases.index') }}"
               class="dash-nav-link {{ request()->is('paddy-purchases*') ? 'active' : '' }}">
                <i class="fas fa-shopping-basket"></i>
                <span>Paddy Purchases</span>
            </a>

            <a href="{{ route('milling-batches.index') }}"
               class="dash-nav-link {{ request()->is('milling-batches*') ? 'active' : '' }}">
                <i class="fas fa-industry"></i>
                <span>Milling Batches</span>
            </a>

            <a href="{{ route('inventory.index') }}"
               class="dash-nav-link {{ request()->is('inventory*') ? 'active' : '' }}">
                <i class="fas fa-boxes-stacked"></i>
                <span>Inventory</span>
            </a>

            <div class="dash-nav-section">Finance</div>

            <a href="{{ route('sales.index') }}"
               class="dash-nav-link {{ request()->is('sales*') ? 'active' : '' }}">
                <i class="fas fa-receipt"></i>
                <span>Sales</span>
            </a>

            <a href="{{ route('reports.index') }}"
               class="dash-nav-link {{ request()->is('reports*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>

            <div class="dash-nav-section">Account</div>

            <a href="{{ route('profile.edit') }}"
               class="dash-nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i>
                <span>Profile</span>
            </a>

        </nav>

        <!-- User card at bottom -->
        <div class="dash-sidebar-bottom">
            @auth
            <div class="dash-user-card">
                <div class="dash-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div style="flex:1;min-width:0;">
                    <div class="dash-user-name">{{ Auth::user()->name }}</div>
                    <div class="dash-user-role">Mill Administrator</div>
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

    <!-- Sidebar overlay (mobile) -->
    <div class="dash-sidebar-overlay" id="dash-overlay"></div>

    <!-- ══════════════ MAIN ══════════════ -->
    <div class="dash-main">

        <!-- Top bar -->
        <header class="dash-topbar">
            <div style="display:flex;align-items:center;gap:0.75rem;">
                <!-- Mobile hamburger -->
                <button class="dash-topbar-btn" id="sidebar-toggle" style="display:none;" aria-label="Open menu">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="dash-topbar-title">
                    @yield('page-title',
                        request()->is('dashboard')         ? 'Dashboard'       :
                        (request()->is('farmers*')         ? 'Farmers'         :
                        (request()->is('paddy-purchases*') ? 'Paddy Purchases' :
                        (request()->is('milling-batches*') ? 'Milling Batches' :
                        (request()->is('inventory*')       ? 'Inventory'       :
                        (request()->is('sales*')           ? 'Sales'           :
                        (request()->is('reports*')         ? 'Reports'         :
                        (request()->is('profile*')         ? 'Profile'         : 'Dashboard'))))))))
                    )
                </span>
            </div>

            <div class="dash-topbar-right">
                <!-- Search -->
                <div class="search-box" style="width:220px;">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>

                <!-- Notifications -->
                <button class="dash-topbar-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="dash-notif-badge">3</span>
                </button>

                <!-- Profile avatar -->
                @auth
                <a href="{{ route('profile.edit') }}" class="dash-topbar-btn" title="Profile">
                    <span style="font-family:'Syne',sans-serif;font-weight:800;font-size:0.75rem;color:var(--primary);">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </span>
                </a>
                @endauth
            </div>
        </header>

        <!-- Page content -->
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
                    <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:
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

<!-- Sidebar overlay styling -->
<style>
.dash-sidebar-overlay {
    display: none; position: fixed; inset: 0;
    background: rgba(0,0,0,0.45); z-index: 99;
    opacity: 0; transition: opacity 0.3s ease;
}
.dash-sidebar-overlay.open { opacity: 1; }
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
    const sidebarToggle = document.getElementById('sidebar-toggle');

    const openSidebar  = () => { sidebar.classList.add('open');  overlay.classList.add('open'); };
    const closeSidebar = () => { sidebar.classList.remove('open'); overlay.classList.remove('open'); };

    sidebarToggle?.addEventListener('click', () => {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });
    overlay?.addEventListener('click', closeSidebar);

    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
});
</script>

</body>
</html>