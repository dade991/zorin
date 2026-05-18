<!DOCTYPE html>
<html lang="en" data-theme="{{ session('theme', 'forest') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Zorin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="dash-layout">

    {{-- ── SIDEBAR ── --}}
    <aside class="dash-sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-text">ZORIN<span>.</span></div>
            <div class="sidebar-tagline">Rice Milling System</div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">📊</span> Dashboard
            </a>

            <div class="sidebar-section">Operations</div>
            <a href="{{ route('farmers.index') }}" class="sidebar-link {{ request()->routeIs('farmers.*') ? 'active' : '' }}">
                <span class="sidebar-icon">👨‍🌾</span> Farmers
            </a>
            <a href="{{ route('paddy-purchases.index') }}" class="sidebar-link {{ request()->routeIs('paddy-purchases.*') ? 'active' : '' }}">
                <span class="sidebar-icon">🛒</span> Paddy Purchases
            </a>
            <a href="{{ route('milling-batches.index') }}" class="sidebar-link {{ request()->routeIs('milling-batches.*') ? 'active' : '' }}">
                <span class="sidebar-icon">⚙️</span> Milling Batches
            </a>
            <a href="{{ route('inventory.index') }}" class="sidebar-link {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                <span class="sidebar-icon">📦</span> Inventory
            </a>

            <div class="sidebar-section">Sales</div>
            <a href="{{ route('customers.index') }}" class="sidebar-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                <span class="sidebar-icon">🤝</span> Customers
            </a>
            <a href="{{ route('sales.index') }}" class="sidebar-link {{ request()->routeIs('sales.*') ? 'active' : '' }}">
                <span class="sidebar-icon">💰</span> Sales
            </a>

            <div class="sidebar-section">Analytics</div>
            <a href="{{ route('reports.index') }}" class="sidebar-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <span class="sidebar-icon">📈</span> Reports
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-user-wrap">
                <div class="sidebar-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">Mill Manager</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout">← Logout</button>
            </form>
        </div>
    </aside>

    {{-- ── MAIN ── --}}
    <div class="dash-main">

        {{-- Topbar --}}
        <header class="dash-topbar">
            <div style="display:flex;align-items:center;gap:.75rem;">
                <button class="sidebar-toggle-btn" id="sidebarToggle">☰</button>
                <span class="dash-page-title">@yield('page-title', 'Dashboard')</span>
            </div>
            <div class="topbar-right">
                <button class="topbar-btn" onclick="document.getElementById('settingsModal').classList.add('open')" title="Settings">⚙️</button>
                <div class="topbar-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
            </div>
        </header>

        {{-- Alerts --}}
        <div style="padding: 0 2rem;">
            @if(session('success'))
                <div class="alert alert-success" style="margin-top:1rem;">✓ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error" style="margin-top:1rem;">⚠ {{ session('error') }}</div>
            @endif
        </div>

        {{-- Page Content --}}
        <main class="dash-content">
            @yield('content')
        </main>
    </div>
</div>

{{-- ── SETTINGS MODAL ── --}}
<div class="modal-bg" id="settingsModal">
    <div class="modal-box">
        <button class="modal-close" onclick="document.getElementById('settingsModal').classList.remove('open')">✕</button>
        <div class="modal-title">⚙️ Settings</div>
        <div class="modal-sub">Personalise your Zorin experience</div>

        <span class="settings-label">Choose Theme</span>
        <div class="theme-grid">
            @foreach([
                ['forest',   '#1A4A2E', '#B8941F', 'Forest',   'Natural green'],
                ['midnight', '#161625', '#FFD166', 'Midnight',  'Dark mode'],
                ['ember',    '#9B1C1C', '#F97316', 'Ember',     'Warm red'],
                ['ocean',    '#0C4A6E', '#0EA5E9', 'Ocean',     'Cool blue'],
                ['golden',   '#78350F', '#D97706', 'Golden',    'Warm amber'],
            ] as [$key, $c1, $c2, $name, $sub])
            <form method="POST" action="{{ route('settings.theme') }}" style="margin:0">
                @csrf
                <input type="hidden" name="theme" value="{{ $key }}">
                <button type="submit" class="theme-opt {{ session('theme','forest') === $key ? 'active' : '' }}" style="width:100%;cursor:pointer;">
                    <div class="theme-swatch" style="background:linear-gradient(135deg, {{ $c1 }} 50%, {{ $c2 }} 100%);"></div>
                    <div class="theme-name">{{ $name }}</div>
                    <div class="theme-sub">{{ $sub }}</div>
                </button>
            </form>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Sidebar toggle (mobile)
    document.getElementById('sidebarToggle')?.addEventListener('click', () => {
        document.getElementById('sidebar').classList.toggle('open');
    });
    // Close modal on backdrop click
    document.getElementById('settingsModal').addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('open');
    });
</script>

@stack('scripts')
</body>
</html>
