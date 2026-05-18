<!DOCTYPE html>
<html lang="en" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zorin — Rice Milling Management</title>
    <meta name="description" content="Zorin is a complete rice milling management system. Track farmers, paddy, milling batches, inventory and sales.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

{{-- LOADER --}}
<div id="zorin-loader">
    <div class="loader-logo">
        <svg class="loader-rice-svg" width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="45" cy="45" r="42" stroke="rgba(255,255,255,0.08)" stroke-width="1.5"/>
            <g transform="rotate(0 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="1"/></g>
            <g transform="rotate(45 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.8"/></g>
            <g transform="rotate(90 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.6"/></g>
            <g transform="rotate(135 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.45"/></g>
            <g transform="rotate(180 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.3"/></g>
            <g transform="rotate(225 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.2"/></g>
            <g transform="rotate(270 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.12"/></g>
            <g transform="rotate(315 45 45)"><ellipse cx="45" cy="10" rx="4.5" ry="10" fill="#D4AE3A" opacity="0.07"/></g>
            <circle cx="45" cy="45" r="12" fill="rgba(255,255,255,0.06)" stroke="rgba(212,174,58,0.35)" stroke-width="1.5"/>
            <circle cx="45" cy="45" r="4" fill="#D4AE3A"/>
        </svg>
        <div class="loader-wordmark">ZORIN<span>.</span></div>
        <div class="loader-subtitle">Rice Milling Management</div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <div class="loader-dots"><span></span><span></span><span></span></div>
    </div>
</div>

{{-- Floating Rice Particles --}}
<div id="particles-container" aria-hidden="true"></div>

{{-- NAV --}}
<nav class="zorin-nav" id="zorin-nav">
    <a href="/" class="nav-logo">ZORIN<span>.</span></a>
    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu">
        <span></span><span></span><span></span>
    </button>
    <ul class="nav-menu" id="nav-menu">
        <li><a href="#about">About</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#services">How It Works</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        <li><a href="{{ route('login') }}" class="nav-cta">Sign In</a></li>
    </ul>
</nav>

{{-- HERO --}}
<section class="hero" id="home">
    <div class="hero-image-wrap">
        <img src="https://images.unsplash.com/photo-1536054348319-58a5ea05f4de?w=1400&q=80" alt="Rice field" loading="eager">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="hero-inner">
            <div class="hero-badge">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <ellipse cx="7" cy="7" rx="3" ry="6" fill="currentColor" transform="rotate(-30 7 7)" opacity="0.8"/>
                    <ellipse cx="7" cy="7" rx="3" ry="6" fill="currentColor" transform="rotate(30 7 7)"/>
                </svg>
                Rice Milling Management System
            </div>
            <h1>Smarter Milling,<br><em>Greater Harvest</em></h1>
            <p class="hero-desc">Zorin gives your rice milling business full control — from paddy purchase to final sale, all in one powerful platform built for modern mills.</p>
            <div class="hero-btns">
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started Free →</a>
                <a href="{{ route('login') }}" class="btn btn-ghost">Sign In</a>
            </div>
        </div>
    </div>
    <div class="hero-photos">
        <div class="hero-photo">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=400&q=80" alt="Farmer in field">
        </div>
        <div class="hero-photo">
            <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?w=400&q=80" alt="Rice grains">
        </div>
        <div class="hero-photo">
            <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=600&q=80" alt="Rice harvest">
        </div>
    </div>
</section>

{{-- STATS --}}
<div class="stats-band">
    <div class="stat-item"><span class="stat-number" data-target="500">0</span><span class="stat-label">Farmers Managed</span></div>
    <div class="stat-item"><span class="stat-number" data-target="12000">0</span><span class="stat-label">Tons Milled</span></div>
    <div class="stat-item"><span class="stat-number" data-target="98">0</span><span class="stat-label">% Accuracy Rate</span></div>
    <div class="stat-item"><span class="stat-number" data-target="6">0</span><span class="stat-label">Core Modules</span></div>
</div>

{{-- ABOUT --}}
<section class="about-section" id="about">
    <div class="about-images">
        <div class="about-img">
            <img src="https://images.unsplash.com/photo-1594736797933-d0401ba2fe65?w=600&q=80" alt="Rice mill operations">
            <div class="img-badge">🌾 Our Mill</div>
        </div>
        <div class="about-img">
            <img src="https://images.unsplash.com/photo-1536054348319-58a5ea05f4de?w=400&q=80" alt="Rice harvest">
        </div>
        <div class="about-img">
            <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?w=400&q=80" alt="Rice grains close up">
            <div class="img-badge">⚙️ Processing</div>
        </div>
    </div>
    <div class="about-text">
        <span class="section-tag">About Zorin</span>
        <h2 class="section-title">Built for the modern rice mill</h2>
        <p class="section-body">Zorin is a complete management system designed specifically for rice milling businesses. Whether you handle 10 farmers or 10,000, Zorin keeps your operations smooth, your records clean, and your profits visible.</p>
        <ul class="about-list">
            <li>Track every bag of paddy from farm to finished rice</li>
            <li>Manage farmer records, purchases, and payments</li>
            <li>Monitor milling batches and output efficiency</li>
            <li>Control inventory levels in real time</li>
            <li>Generate sales invoices and revenue reports instantly</li>
        </ul>
        <div style="margin-top:2.5rem; display:flex; gap:1rem; flex-wrap:wrap;">
            <a href="{{ route('register') }}" class="btn btn-primary">Start Managing Today</a>
            <a href="#features" class="btn btn-outline">See All Features</a>
        </div>
    </div>
</section>

{{-- FEATURES --}}
<section class="features-section" id="features">
    <div class="features-header">
        <span class="section-tag" style="justify-content:center;">What We Offer</span>
        <h2 class="section-title">Everything your mill needs</h2>
        <p class="section-body">Six powerful modules working together to run your entire rice milling operation from one central platform.</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon-wrap">👨‍🌾</div>
            <div class="feature-title">Farmer Management</div>
            <p class="feature-body">Store and manage all farmer records, contact details, villages, and complete purchase history in one organized place.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">🛒</div>
            <div class="feature-title">Paddy Purchasing</div>
            <p class="feature-body">Record every purchase with weight, price per kg, and total cost — automatically linked to the farmer's profile.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">⚙️</div>
            <div class="feature-title">Milling Process</div>
            <p class="feature-body">Log input paddy weight, milled rice output, and waste per batch. Efficiency calculated automatically for you.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">📦</div>
            <div class="feature-title">Inventory Control</div>
            <p class="feature-body">Keep a live view of your rice stock. Get notified when quantities fall below your set thresholds.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">🤝</div>
            <div class="feature-title">Customer Sales</div>
            <p class="feature-body">Manage customer orders, generate invoices, and track all sales revenue day by day — automatically.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon-wrap">📈</div>
            <div class="feature-title">Reports & Analytics</div>
            <p class="feature-body">Charts showing income, expenses, milling efficiency, and profit margins across any custom date range.</p>
        </div>
    </div>
</section>

{{-- GALLERY --}}
<section class="gallery-section" id="gallery">
    <div class="gallery-header">
        <span class="section-tag" style="justify-content:center;">Our Operations</span>
        <h2 class="section-title">From field to finished rice</h2>
        <p class="section-body">A look at the Zorin rice milling process — every step captured, tracked, and managed.</p>
    </div>
    <div class="gallery-grid">
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1536054348319-58a5ea05f4de?w=800&q=80" alt="Rice fields">
            <div class="gallery-overlay"><span class="gallery-label">Paddy Fields</span></div>
        </div>
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=500&q=80" alt="Farmer">
            <div class="gallery-overlay"><span class="gallery-label">Farmer Collection</span></div>
        </div>
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=500&q=80" alt="Harvest">
            <div class="gallery-overlay"><span class="gallery-label">Harvest Season</span></div>
        </div>
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1594736797933-d0401ba2fe65?w=500&q=80" alt="Milling">
            <div class="gallery-overlay"><span class="gallery-label">Milling Process</span></div>
        </div>
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?w=500&q=80" alt="Rice grains">
            <div class="gallery-overlay"><span class="gallery-label">Quality Rice</span></div>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="process-section" id="services">
    <div>
        <span class="section-tag" style="justify-content:center;">How It Works</span>
        <h2 class="section-title" style="text-align:center;">Simple process, powerful results</h2>
    </div>
    <div class="process-grid">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-title">Farmer Arrives</div>
            <p class="step-desc">Farmer delivers paddy. Their record is looked up and arrival is logged instantly in the system.</p>
        </div>
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-title">Purchase Recorded</div>
            <p class="step-desc">Weight and price per kg entered. Total is calculated and saved to the farmer's account automatically.</p>
        </div>
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-title">Milling Starts</div>
            <p class="step-desc">Paddy goes to the mill. Input and output weights are logged per batch for efficiency tracking.</p>
        </div>
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-title">Stock Updated</div>
            <p class="step-desc">Milled rice is added to your live inventory automatically after each batch completes.</p>
        </div>
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-title">Sale Made</div>
            <p class="step-desc">Customer buys rice. Invoice is generated and stock is deducted from inventory instantly.</p>
        </div>
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-title">Reports Ready</div>
            <p class="step-desc">Your dashboard shows profit, efficiency, and revenue at a glance — always up to date.</p>
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section class="contact-section" id="contact">
    <div class="contact-inner">
        <div>
            <span class="section-tag">Get In Touch</span>
            <h2 class="section-title">Start your free<br>trial today</h2>
            <p class="section-body" style="margin-bottom:2.5rem;">Have questions about Zorin? Send us a message and we'll get back to you as quickly as possible.</p>
            <div style="display:flex; flex-direction:column; gap:1rem;">
                <div style="display:flex; align-items:center; gap:0.85rem; color:var(--text-muted); font-size:0.9rem;">
                    <div style="width:38px;height:38px;background:var(--primary-pale);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;">📍</div>
                    Nigeria
                </div>
                <div style="display:flex; align-items:center; gap:0.85rem; color:var(--text-muted); font-size:0.9rem;">
                    <div style="width:38px;height:38px;background:var(--primary-pale);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;">✉️</div>
                    hello@zorin.app
                </div>
                <div style="display:flex; align-items:center; gap:0.85rem; color:var(--text-muted); font-size:0.9rem;">
                    <div style="width:38px;height:38px;background:var(--primary-pale);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;">📞</div>
                    +234 800 000 0000
                </div>
            </div>
        </div>
        <div class="contact-form-wrap">
            <div class="form-title">Send a Message</div>
            <div class="form-subtitle">We typically reply within 24 hours</div>
            <form onsubmit="return false;">
                <div class="form-group form-row">
                    <div>
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-input" placeholder="John">
                    </div>
                    <div>
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-input" placeholder="Doe">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" placeholder="john@yourmill.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Mill / Business Name</label>
                    <input type="text" class="form-input" placeholder="Your Rice Mill">
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-input form-textarea" placeholder="Tell us about your operation..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:0.5rem;">
                    Send Message →
                </button>
            </form>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="zorin-footer">
    <div class="footer-top">
        <div class="footer-brand">
            <div class="footer-logo">ZORIN<span>.</span></div>
            <p>A complete rice milling management system built for modern rice mills across Nigeria and beyond. Track, manage, and grow with confidence.</p>
        </div>
        <div class="footer-col">
            <h4>Platform</h4>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="#services">How It Works</a></li>
                <li><a href="{{ route('login') }}">Sign In</a></li>
                <li><a href="{{ route('register') }}">Register Free</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Modules</h4>
            <ul>
                <li><a href="#">Farmer Management</a></li>
                <li><a href="#">Paddy Purchasing</a></li>
                <li><a href="#">Milling Batches</a></li>
                <li><a href="#">Inventory & Sales</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© {{ date('Y') }} Zorin Rice Milling System. All rights reserved.</span>
        <span>Built with Laravel & Vite 🌾</span>
    </div>
</footer>

<script>
// ── LOADER ──
window.addEventListener('load', () => {
    setTimeout(() => {
        document.getElementById('zorin-loader').classList.add('hidden');
        document.body.style.overflow = '';
    }, 2200);
});
document.body.style.overflow = 'hidden';

// ── RICE PARTICLES ──
const container = document.getElementById('particles-container');
container.style.cssText = 'position:fixed;inset:0;pointer-events:none;z-index:1;overflow:hidden;';
function spawnParticle() {
    const el = document.createElementNS('http://www.w3.org/2000/svg','svg');
    const size = Math.random() * 14 + 6;
    el.setAttribute('width', size);
    el.setAttribute('height', size * 2.2);
    el.setAttribute('viewBox', '0 0 10 22');
    el.innerHTML = '<ellipse cx="5" cy="11" rx="4" ry="9" fill="var(--accent)" opacity="0.12"/>';
    el.style.cssText = `position:absolute;left:${Math.random()*100}vw;bottom:-50px;animation:floatParticle ${Math.random()*15+12}s linear ${Math.random()*5}s infinite;`;
    container.appendChild(el);
}
const style = document.createElement('style');
style.textContent = `@keyframes floatParticle {
    0%   { transform: translateY(0) rotate(${Math.random()*360}deg); opacity:0; }
    8%   { opacity:0.18; }
    92%  { opacity:0.12; }
    100% { transform: translateY(-110vh) rotate(${Math.random()*720+360}deg); opacity:0; }
}`;
document.head.appendChild(style);
for (let i = 0; i < 18; i++) spawnParticle();

// ── NAV ──
const nav = document.getElementById('zorin-nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 20));
const toggle = document.getElementById('nav-toggle');
const menu   = document.getElementById('nav-menu');
toggle.addEventListener('click', () => {
    toggle.classList.toggle('open');
    menu.classList.toggle('open');
});
menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    toggle.classList.remove('open');
    menu.classList.remove('open');
}));

// ── SCROLL ANIMATIONS ──
const obs = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add('visible'), (entry.target.dataset.delay || 0));
        }
    });
}, { threshold: 0.1 });
document.querySelectorAll('.stat-item, .feature-card, .process-step, .about-images, .about-text').forEach((el, i) => {
    el.dataset.delay = (i % 4) * 100;
    obs.observe(el);
});

// ── COUNTER ANIMATION ──
const statsObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.stat-number').forEach(el => {
                const target = parseInt(el.dataset.target);
                const suffix = target === 98 ? '%' : '+';
                let start = 0;
                const duration = 2000;
                const startTime = performance.now();
                const tick = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.round(eased * target).toLocaleString() + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
            });
            statsObs.disconnect();
        }
    });
}, { threshold: 0.4 });
const band = document.querySelector('.stats-band');
if (band) statsObs.observe(band);

// ── SAVE THEME ──
const savedTheme = localStorage.getItem('zorin-theme') || 'forest';
document.documentElement.setAttribute('data-theme', savedTheme);
</script>
</body>
</html>
