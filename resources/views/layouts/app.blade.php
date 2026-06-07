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
            <a href="{{ route('bookings.index') }}"
               class="dash-nav-link {{ request()->is('bookings*') ? 'active' : '' }}"
               aria-current="{{ request()->is('bookings*') ? 'page' : 'false' }}">
                <i class="fas fa-calendar-check"></i>
                <span>My Bookings</span>
            </a>
            <a href="{{ route('chat.index') }}"
               class="dash-nav-link {{ request()->is('chat*') ? 'active' : '' }}"
               aria-current="{{ request()->is('chat*') ? 'page' : 'false' }}">
                <i class="fas fa-comments"></i>
                <span>Chat Support</span>
            </a>

            @if(auth()->user()->is_admin ?? false)
                <div class="dash-nav-section">Admin</div>
                <a href="{{ route('admin.dashboard') }}"
                   class="dash-nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Overview</span>
                </a>
                <a href="{{ route('admin.users') }}"
                   class="dash-nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.bookings') }}"
                   class="dash-nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                    <i class="fas fa-receipt"></i>
                    <span>Bookings</span>
                </a>
                <a href="{{ route('admin.machines') }}"
                   class="dash-nav-link {{ request()->is('admin/machines*') ? 'active' : '' }}">
                    <i class="fas fa-gears"></i>
                    <span>Machines</span>
                </a>
                <a href="{{ route('admin.chat') }}"
                   class="dash-nav-link {{ request()->is('admin/chat*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    <span>Chat Messages</span>
                </a>
                <a href="{{ route('admin.notifications') }}"
                   class="dash-nav-link {{ request()->is('admin/notifications*') ? 'active' : '' }}">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            @endif
        </nav>

        <div class="dash-sidebar-bottom">
            @auth
            <div class="dash-user-card">
                <div class="dash-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div style="flex:1;min-width:0;">
                    <div class="dash-user-name">{{ Auth::user()->name }}</div>
                    <div class="dash-user-role">{{ auth()->user()->is_admin ? 'Administrator' : 'User' }}</div>
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
        <!-- TOPBAR -->
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
                <!-- Search -->
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

                <!-- User Dropdown -->
                <div class="user-dropdown-wrap">
                    <button class="dash-topbar-btn user-avatar-btn" id="user-toggle" aria-label="User menu" aria-expanded="false">
                        <div class="dash-user-avatar" style="width:32px;height:32px;font-size:0.75rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                    </button>
                    <div class="user-dropdown" id="user-dropdown">
                        <div class="user-dropdown-header">
                            <div class="dash-user-avatar" style="width:40px;height:40px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="user-dropdown-name">{{ Auth::user()->name }}</div>
                                <div class="user-dropdown-email">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="user-dropdown-menu">
                            <a href="{{ route('dashboard') }}" class="user-dropdown-item">
                                <i class="fas fa-house"></i> Dashboard
                            </a>
                            <a href="{{ route('bookings.index') }}" class="user-dropdown-item">
                                <i class="fas fa-calendar-check"></i> My Bookings
                            </a>
                            <a href="{{ route('chat.index') }}" class="user-dropdown-item">
                                <i class="fas fa-comments"></i> Chat Support
                            </a>
                            <div class="user-dropdown-divider"></div>
                            <a href="{{ route('profile.edit') }}" class="user-dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="logout-form-dropdown">
                                @csrf
                                <button type="submit" class="user-dropdown-item user-dropdown-logout">
                                    <i class="fas fa-sign-out-alt"></i> Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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

/* User Dropdown Styles */
.user-dropdown-wrap {
    position: relative;
}
.user-avatar-btn {
    padding: 0 !important;
    overflow: hidden;
}
.user-dropdown {
    position: absolute;
    top: calc(100% + 0.75rem);
    right: 0;
    width: 280px;
    background: var(--surface);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 16px;
    box-shadow: 0 20px 50px rgba(26, 74, 46, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.25s ease;
    z-index: 100;
    overflow: hidden;
}
.user-dropdown.open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.user-dropdown-header {
    display: flex;
    align-items: center;
    gap: 0.875rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    color: #ffffff;
}
.user-dropdown-name {
    font-weight: 600;
    font-size: 0.9375rem;
}
.user-dropdown-email {
    font-size: 0.8125rem;
    opacity: 0.8;
}
.user-dropdown-menu {
    display: flex;
    flex-direction: column;
    padding: 0.5rem;
}
.user-dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 10px;
    font-size: 0.9375rem;
    color: var(--text-main);
    text-decoration: none;
    transition: all 0.2s;
    cursor: pointer;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
}
.user-dropdown-item:hover {
    background: rgba(26, 74, 46, 0.06);
    color: var(--primary);
}
.user-dropdown-divider {
    height: 1px;
    background: var(--border-light);
    margin: 0.5rem 0.75rem;
}
.user-dropdown-logout {
    color: #dc2626;
}
.user-dropdown-logout:hover {
    background: rgba(220, 38, 38, 0.06);
    color: #dc2626;
}
.logout-form-dropdown {
    margin: 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Sidebar
    const sidebar = document.getElementById('dash-sidebar');
    const overlay = document.getElementById('dash-overlay');
    const toggle = document.getElementById('sidebar-toggle');
    
    const openSidebar = () => { 
        sidebar.classList.add('open'); 
        overlay.classList.add('open'); 
        toggle.setAttribute('aria-expanded', 'true');
    };
    const closeSidebar = () => { 
        sidebar.classList.remove('open'); 
        overlay.classList.remove('open'); 
        toggle.setAttribute('aria-expanded', 'false');
    };
    
    toggle?.addEventListener('click', () => sidebar.classList.contains('open') ? closeSidebar() : openSidebar());
    overlay?.addEventListener('click', closeSidebar);

    // Notification dropdown
    const notifToggle = document.getElementById('notif-toggle');
    const notifDropdown = document.getElementById('notif-dropdown');

    notifToggle?.addEventListener('click', (e) => {
        e.stopPropagation();
        // Close user dropdown
        userDropdown?.classList.remove('open');
        userToggle?.setAttribute('aria-expanded', 'false');
        
        const isOpen = notifDropdown.classList.toggle('open');
        notifToggle.setAttribute('aria-expanded', isOpen);
    });

    // User dropdown
    const userToggle = document.getElementById('user-toggle');
    const userDropdown = document.getElementById('user-dropdown');

    userToggle?.addEventListener('click', (e) => {
        e.stopPropagation();
        // Close notif dropdown
        notifDropdown?.classList.remove('open');
        notifToggle?.setAttribute('aria-expanded', 'false');
        
        const isOpen = userDropdown.classList.toggle('open');
        userToggle.setAttribute('aria-expanded', isOpen);
    });

    // Close all dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!userDropdown?.contains(e.target) && !userToggle?.contains(e.target)) {
            userDropdown?.classList.remove('open');
            userToggle?.setAttribute('aria-expanded', 'false');
        }
        if (!notifDropdown?.contains(e.target) && !notifToggle?.contains(e.target)) {
            notifDropdown?.classList.remove('open');
            notifToggle?.setAttribute('aria-expanded', 'false');
        }
    });

    // Auto-dismiss alerts
    document.querySelectorAll('.alert').forEach(a => {
        setTimeout(() => { 
            a.style.transition = 'opacity 0.5s'; 
            a.style.opacity = '0'; 
            setTimeout(() => a.remove(), 500); 
        }, 5000);
    });
});
</script>
</body>
</html>