<!DOCTYPE html>
<html lang="en" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Zorin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<script>
    const t = localStorage.getItem('zorin-theme') || 'forest';
    document.documentElement.setAttribute('data-theme', t);
</script>

<div class="dash-layout">

    {{-- SIDEBAR --}}
    <aside class="dash-sidebar" id="dash-sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-text">ZORIN<span>.</span></div>
            <div class="sidebar-tagline">Rice Milling System</div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('dashboard') }}" class="sidebar-link active">
                <span class="sidebar-icon">📊</span> Dashboard
            </a>
            <a href="{{ route('farmers.index') }}" class="sidebar-link">
                <span class="sidebar-icon">👨‍🌾</span> Farmers
            </a>

            <div class="sidebar-section">Operations</div>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">🛒</span> Paddy Purchases
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">⚙️</span> Milling Batches
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">📦</span> Inventory
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">🤝</span> Sales
            </a>

            <div class="sidebar-section">Finance</div>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">📈</span> Reports
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">💰</span> Revenue
            </a>

            <div class="sidebar-section">System</div>
            <a href="#" class="sidebar-link" onclick="openSettings()">
                <span class="sidebar-icon">⚙️</span> Settings
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                    <div class="sidebar-user-role">Mill Manager</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-top:0.5rem;">
                @csrf
                <button type="submit" style="width:100%;padding:0.6rem;background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.5);border:1px solid rgba(255,255,255,0.08);border-radius:var(--radius-sm);font-size:0.8rem;cursor:pointer;transition:all var(--transition);font-family:inherit;">
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="dash-main">

        {{-- TOP BAR --}}
        <header class="dash-topbar">
            <div style="display:flex;align-items:center;gap:1rem;">
                <button class="topbar-btn" id="sidebar-toggle" style="display:none;" onclick="toggleSidebar()">☰</button>
                <div class="dash-page-title">Dashboard</div>
            </div>
            <div class="dash-topbar-right">
                <button class="topbar-btn" title="Notifications">
                    🔔
                    <span class="topbar-badge">3</span>
                </button>
                <button class="topbar-btn" onclick="openSettings()" title="Settings">⚙️</button>
                <div style="width:34px;height:34px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;font-weight:800;font-size:0.85rem;color:#fff;cursor:pointer;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </header>

        {{-- CONTENT --}}
        <div class="dash-content">

            {{-- Welcome bar --}}
            <div style="margin-bottom:2rem;">
                <h1 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:900;color:var(--primary);margin-bottom:0.25rem;">
                    Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening') }}, {{ explode(' ', Auth::user()->name)[0] }} 👋
                </h1>
                <p style="color:var(--text-muted);font-size:0.9rem;font-weight:300;">Here's what's happening at your mill today — {{ now()->format('l, F j, Y') }}</p>
            </div>

            {{-- STAT CARDS --}}
            <div class="dash-stats">
                <div class="dash-stat-card">
                    <div class="stat-card-icon">👨‍🌾</div>
                    <div class="stat-card-value" id="farmer-count">—</div>
                    <div class="stat-card-label">Total Farmers</div>
                    <div class="stat-card-change up">↑ Active this month</div>
                </div>
                <div class="dash-stat-card">
                    <div class="stat-card-icon">🛒</div>
                    <div class="stat-card-value">₦0</div>
                    <div class="stat-card-label">Paddy Purchased</div>
                    <div class="stat-card-change up">↑ This week</div>
                </div>
                <div class="dash-stat-card">
                    <div class="stat-card-icon">📦</div>
                    <div class="stat-card-value">0 kg</div>
                    <div class="stat-card-label">Rice in Stock</div>
                    <div class="stat-card-change" style="color:var(--text-muted);">— No sales yet</div>
                </div>
                <div class="dash-stat-card">
                    <div class="stat-card-icon">💰</div>
                    <div class="stat-card-value">₦0</div>
                    <div class="stat-card-label">Revenue This Month</div>
                    <div class="stat-card-change" style="color:var(--text-muted);">— Getting started</div>
                </div>
            </div>

            {{-- QUICK ACTIONS --}}
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:2rem;">
                <a href="{{ route('farmers.create') }}" class="btn btn-primary" style="justify-content:center;">+ Add Farmer</a>
                <a href="#" class="btn btn-outline" style="justify-content:center;">+ New Purchase</a>
                <a href="#" class="btn btn-ghost" style="justify-content:center;">+ Milling Batch</a>
                <a href="#" class="btn btn-ghost" style="justify-content:center;">+ Record Sale</a>
            </div>

            {{-- RECENT FARMERS TABLE --}}
            <div class="dash-table-wrap" style="margin-bottom:2rem;">
                <div class="dash-table-header">
                    <div class="dash-table-title">Recent Farmers</div>
                    <a href="{{ route('farmers.index') }}" style="font-size:0.82rem;font-weight:600;color:var(--primary);">View All →</a>
                </div>
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Village</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Farmer::latest()->take(8)->get() as $farmer)
                        <tr>
                            <td style="font-weight:600;">{{ $farmer->name }}</td>
                            <td>{{ $farmer->phone ?? '—' }}</td>
                            <td>{{ $farmer->village ?? '—' }}</td>
                            <td><span class="table-badge badge-green">Active</span></td>
                            <td>
                                <div style="display:flex;gap:0.5rem;">
                                    <a href="{{ route('farmers.edit', $farmer) }}" style="font-size:0.78rem;color:var(--primary);font-weight:600;">Edit</a>
                                    <form method="POST" action="{{ route('farmers.destroy', $farmer) }}" onsubmit="return confirm('Delete this farmer?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="font-size:0.78rem;color:#DC2626;font-weight:600;background:none;border:none;cursor:pointer;font-family:inherit;padding:0;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align:center;color:var(--text-muted);padding:2.5rem;font-size:0.88rem;">
                                No farmers yet. <a href="{{ route('farmers.create') }}" style="color:var(--primary);font-weight:600;">Add your first farmer →</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- GETTING STARTED CARD --}}
            <div style="background:linear-gradient(135deg,var(--primary) 0%,var(--primary-mid) 100%);border-radius:var(--radius-lg);padding:2.5rem;color:#fff;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;">
                <div>
                    <h3 style="font-family:'Syne',sans-serif;font-size:1.25rem;font-weight:800;margin-bottom:0.4rem;">🌾 Get started with Zorin</h3>
                    <p style="color:rgba(255,255,255,0.7);font-size:0.88rem;font-weight:300;max-width:420px;">Add your first farmer, record a paddy purchase, and run your first milling batch to unlock the full power of your dashboard.</p>
                </div>
                <a href="{{ route('farmers.create') }}" style="background:var(--gold);color:#fff;padding:0.85rem 2rem;border-radius:var(--radius-xl);font-weight:700;font-size:0.9rem;white-space:nowrap;transition:all 0.3s ease;display:inline-block;">
                    Add First Farmer →
                </a>
            </div>

        </div>{{-- end dash-content --}}
    </div>{{-- end dash-main --}}
</div>{{-- end dash-layout --}}

{{-- SETTINGS MODAL --}}
<div id="settings-modal" style="display:none;position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,0.5);backdrop-filter:blur(4px);align-items:center;justify-content:center;">
    <div style="background:var(--card-bg);border-radius:var(--radius-lg);padding:2.5rem;width:90%;max-width:560px;max-height:90vh;overflow-y:auto;border:1px solid var(--border);box-shadow:var(--shadow-lg);position:relative;">
        <button onclick="closeSettings()" style="position:absolute;top:1.5rem;right:1.5rem;background:var(--page-bg);border:1px solid var(--border);border-radius:var(--radius-sm);width:36px;height:36px;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;">✕</button>

        <h2 style="font-family:'Syne',sans-serif;font-size:1.3rem;font-weight:800;color:var(--primary);margin-bottom:0.35rem;">Settings</h2>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-bottom:2rem;">Customize Zorin to match your style.</p>

        <h3 style="font-size:0.8rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:1rem;">Choose Theme</h3>

        <div class="theme-grid">
            <div class="theme-option" data-theme="forest" onclick="setTheme('forest')">
                <div class="theme-swatch" style="background:linear-gradient(135deg,#1A4A2E 50%,#B8941F 50%);"></div>
                <div class="theme-name">Forest</div>
                <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">Default</div>
            </div>
            <div class="theme-option" data-theme="midnight" onclick="setTheme('midnight')">
                <div class="theme-swatch" style="background:linear-gradient(135deg,#0D0D1A 50%,#7C3AED 50%);"></div>
                <div class="theme-name">Midnight</div>
                <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">Dark Mode</div>
            </div>
            <div class="theme-option" data-theme="ember" onclick="setTheme('ember')">
                <div class="theme-swatch" style="background:linear-gradient(135deg,#9B1C1C 50%,#F97316 50%);"></div>
                <div class="theme-name">Ember</div>
                <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">Red & Orange</div>
            </div>
            <div class="theme-option" data-theme="ocean" onclick="setTheme('ocean')">
                <div class="theme-swatch" style="background:linear-gradient(135deg,#0C4A6E 50%,#0EA5E9 50%);"></div>
                <div class="theme-name">Ocean</div>
                <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">Blue & Teal</div>
            </div>
            <div class="theme-option" data-theme="golden" onclick="setTheme('golden')">
                <div class="theme-swatch" style="background:linear-gradient(135deg,#78350F 50%,#D97706 50%);"></div>
                <div class="theme-name">Golden</div>
                <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">Amber & Brown</div>
            </div>
        </div>

        <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid var(--border);">
            <h3 style="font-size:0.8rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:1rem;">Mill Information</h3>
            <div style="display:grid;gap:0.85rem;">
                <div>
                    <label style="font-size:0.78rem;font-weight:700;color:var(--text);display:block;margin-bottom:0.35rem;">Mill Name</label>
                    <input type="text" value="Zorin Rice Mill" style="width:100%;padding:0.75rem 1rem;background:var(--page-bg);border:1.5px solid var(--border);border-radius:var(--radius-sm);font-family:inherit;font-size:0.9rem;color:var(--text);outline:none;">
                </div>
                <div>
                    <label style="font-size:0.78rem;font-weight:700;color:var(--text);display:block;margin-bottom:0.35rem;">Location</label>
                    <input type="text" value="Nigeria" style="width:100%;padding:0.75rem 1rem;background:var(--page-bg);border:1.5px solid var(--border);border-radius:var(--radius-sm);font-family:inherit;font-size:0.9rem;color:var(--text);outline:none;">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Theme
function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('zorin-theme', theme);
    document.querySelectorAll('.theme-option').forEach(el => {
        el.classList.toggle('active', el.dataset.theme === theme);
    });
}
function openSettings() {
    const modal = document.getElementById('settings-modal');
    modal.style.display = 'flex';
    const current = localStorage.getItem('zorin-theme') || 'forest';
    document.querySelectorAll('.theme-option').forEach(el => {
        el.classList.toggle('active', el.dataset.theme === current);
    });
}
function closeSettings() {
    document.getElementById('settings-modal').style.display = 'none';
}
document.getElementById('settings-modal').addEventListener('click', function(e) {
    if (e.target === this) closeSettings();
});

// Sidebar toggle (mobile)
function toggleSidebar() {
    document.getElementById('dash-sidebar').classList.toggle('open');
}

// Farmer count
fetch('/farmers', { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
    .then(() => {
        const el = document.getElementById('farmer-count');
        if (el) el.textContent = '—';
    }).catch(() => {});

// Load farmer count via simple approach
@php $farmerCount = \App\Models\Farmer::count(); @endphp
document.getElementById('farmer-count').textContent = '{{ $farmerCount }}';

// Responsive sidebar toggle visibility
if (window.innerWidth <= 1024) {
    document.getElementById('sidebar-toggle').style.display = 'flex';
}
window.addEventListener('resize', () => {
    document.getElementById('sidebar-toggle').style.display = window.innerWidth <= 1024 ? 'flex' : 'none';
});
</script>

</body>
</html>
