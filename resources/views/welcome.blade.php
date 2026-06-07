<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zorin Rice Milling — Premium Agricultural Management</title>
    <meta name="description" content="Nigeria's most trusted rice milling management platform. Manage farmers, paddy purchases, milling batches, inventory and sales.">
    <link rel="icon" href="/favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">

<!-- ═══════════ PAGE LOADER ═══════════ -->
<div id="zorin-loader">
    <div class="loader-logo">
        <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="26" cy="12" rx="5" ry="9" fill="#D4AE3A" transform="rotate(-15 26 12)" opacity="0.9"/>
            <ellipse cx="38" cy="22" rx="5" ry="9" fill="#D4AE3A" transform="rotate(10 38 22)" opacity="0.7"/>
            <ellipse cx="14" cy="22" rx="5" ry="9" fill="#D4AE3A" transform="rotate(-40 14 22)" opacity="0.7"/>
            <line x1="26" y1="22" x2="26" y2="46" stroke="#52B788" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="26" y1="36" x2="18" y2="30" stroke="#52B788" stroke-width="2" stroke-linecap="round"/>
            <line x1="26" y1="32" x2="34" y2="26" stroke="#52B788" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <div class="loader-wordmark">ZOR<span>IN</span></div>
        <div class="loader-sub">Rice Milling Management</div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <div class="loader-dots"><span></span><span></span><span></span></div>
    </div>
</div>

<!-- ═══════════ NAVIGATION ═══════════ -->
<<nav class="w-nav" id="w-nav">
    <div class="w-nav-inner">
        <a href="{{ route('home') }}" class="w-nav-logo" aria-label="Zorin Home">ZOR<span>IN</span></a>

        <ul class="w-nav-menu" id="w-nav-menu" role="menubar">
            <li role="none"><a href="#about" role="menuitem">About</a></li>
            <li role="none"><a href="#features" role="menuitem">Features</a></li>
            <li role="none"><a href="#process" role="menuitem">Process</a></li>
            <li role="none"><a href="#gallery" role="menuitem">Gallery</a></li>
            <li role="none"><a href="#testimonials" role="menuitem">Testimonials</a></li>
            <li role="none"><a href="#faq" role="menuitem">FAQ</a></li>
            @auth
                <li role="none"><a href="{{ route('dashboard') }}" class="w-nav-cta">Dashboard</a></li>
            @else
                <li role="none"><a href="{{ route('login') }}">Sign In</a></li>
                <li role="none"><a href="{{ route('register') }}" class="w-nav-cta">Get Started</a></li>
            @endauth
        </ul>

        <button class="w-nav-toggle" id="w-nav-toggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="w-nav-menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ═══════════ HERO ═══════════ -->
<section class="w-hero">
    <div class="w-hero-image-wrap">
        <img src="/images/operations/paddy-fields.jpg" alt="Paddy fields at dawn" fetchpriority="high">
    </div>
    <div class="w-hero-overlay"></div>

    <div class="w-hero-content">
        <div class="w-hero-inner">
            <div class="w-hero-badge">
                <span class="w-badge-dot" aria-hidden="true"></span>
                ISO 9001:2015 Certified
            </div>
            <h1>Premium <em>Rice</em>,<br>Milled with Precision</h1>
            <p class="w-hero-desc">
                Nigeria's most trusted rice milling platform — from paddy procurement
                to polished grain, every stage managed with intelligence and care.
            </p>
            <div class="w-hero-btns">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-tachometer-alt"></i> Open Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fas fa-seedling"></i> Get Started Free
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        Sign In <i class="fas fa-arrow-right"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Floating photo grid -->
    <div class="w-hero-photos" aria-hidden="true">
        <div class="w-hero-photo">
            <img src="/images/operations/rice-harvest.jpg" alt="Rice harvest" loading="lazy" decoding="async">
        </div>
        <div class="w-hero-photo">
            <img src="/images/operations/quality-rice.jpg" alt="Quality rice" loading="lazy" decoding="async">
        </div>
        <div class="w-hero-photo">
            <img src="/images/operations/mill-operations.jpg" alt="Mill operations" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- ═══════════ TICKER ═══════════ -->
<div class="w-ticker">
    <div class="w-ticker-inner" id="w-ticker-inner">
        <span class="w-ticker-item"><i class="fas fa-check-circle"></i> ISO 9001 Certified</span>
        <span class="w-ticker-item"><i class="fas fa-wheat-awn"></i> Premium Grade Paddy</span>
        <span class="w-ticker-item"><i class="fas fa-users"></i> 1,200+ Registered Farmers</span>
        <span class="w-ticker-item"><i class="fas fa-industry"></i> 3 Milling Facilities</span>
        <span class="w-ticker-item"><i class="fas fa-shield-halved"></i> Trusted Since 2010</span>
        <span class="w-ticker-item"><i class="fas fa-chart-line"></i> 98% Client Retention</span>
        <span class="w-ticker-item"><i class="fas fa-truck"></i> Nationwide Delivery</span>
        <span class="w-ticker-item"><i class="fas fa-leaf"></i> Sustainable Practices</span>
        <!-- Duplicate for seamless scroll -->
        <span class="w-ticker-item"><i class="fas fa-check-circle"></i> ISO 9001 Certified</span>
        <span class="w-ticker-item"><i class="fas fa-wheat-awn"></i> Premium Grade Paddy</span>
        <span class="w-ticker-item"><i class="fas fa-users"></i> 1,200+ Registered Farmers</span>
        <span class="w-ticker-item"><i class="fas fa-industry"></i> 3 Milling Facilities</span>
        <span class="w-ticker-item"><i class="fas fa-shield-halved"></i> Trusted Since 2010</span>
        <span class="w-ticker-item"><i class="fas fa-chart-line"></i> 98% Client Retention</span>
        <span class="w-ticker-item"><i class="fas fa-truck"></i> Nationwide Delivery</span>
        <span class="w-ticker-item"><i class="fas fa-leaf"></i> Sustainable Practices</span>
    </div>
</div>

<!-- ═══════════ STATS BAND ═══════════ -->
<div class="w-stats-band" id="stats-band">
    <div class="w-stats-inner">
        <div class="w-stat-item">
            <span class="w-stat-number" data-target="1200">0</span>
            <span class="w-stat-label">Farmers Registered</span>
        </div>
        <div class="w-stat-item">
            <span class="w-stat-number" data-target="48000" data-suffix=" MT">0</span>
            <span class="w-stat-label">Paddy Processed Annually</span>
        </div>
        <div class="w-stat-item">
            <span class="w-stat-number" data-target="99" data-suffix="%">0</span>
            <span class="w-stat-label">Milling Efficiency</span>
        </div>
        <div class="w-stat-item">
            <span class="w-stat-number" data-target="14">0</span>
            <span class="w-stat-label">Years of Excellence</span>
        </div>
    </div>
</div>

<!-- ═══════════ ABOUT ═══════════ -->
<section id="about" class="w-about">
    <div class="w-about-inner">
        <div class="w-about-images" data-animate="from-left">
            <div class="w-about-img">
                <img src="/images/operations/farmer-field.jpg" alt="Farmer in field" loading="lazy" decoding="async">
                <div class="w-img-badge">📍 Kano State, NG</div>
            </div>
            <div class="w-about-img">
                <img src="/images/operations/milling-process.jpg" alt="Milling process" loading="lazy" decoding="async">
            </div>
            <div class="w-about-img">
                <img src="/images/operations/rice-grains.jpg" alt="Quality rice grains" loading="lazy" decoding="async">
                <div class="w-img-badge">✓ Grade A Certified</div>
            </div>
        </div>

        <div class="w-about-text" data-animate="from-right">
            <span class="w-section-tag">Who We Are</span>
            <h2 class="w-section-title">Rooted in the Fields,<br>Driven by Technology</h2>
            <p class="w-section-body">
                Zorin Rice Milling has served Northern Nigeria's farming communities for over a decade.
                We combine deep agricultural knowledge with modern management software to deliver
                exceptional grain quality and transparent operations.
            </p>
            <ul class="w-about-list">
                <li>State-of-the-art moisture testing and grade classification</li>
                <li>Direct farmer partnerships ensuring fair, transparent pricing</li>
                <li>Real-time inventory tracking from paddy intake to packaged rice</li>
                <li>Full audit trail on every batch for regulatory compliance</li>
                <li>ISO 9001:2015 certified processes across all facilities</li>
            </ul>
        </div>
    </div>
</section>

<!-- ═══════════ FEATURES ═══════════ -->
<section id="features" class="w-features">
    <div class="w-features-header">
        <span class="w-section-tag">Platform Features</span>
        <h2 class="w-section-title">Everything You Need to Run Your Mill</h2>
        <p class="w-section-body">One integrated platform for farmers, purchases, milling, inventory, and sales.</p>
    </div>
    <div class="w-features-grid stagger" id="features-grid">
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-user-tie"></i></div>
            <div class="w-feature-title">Farmer Management</div>
            <p class="w-feature-body">Maintain detailed farmer profiles, track purchase history, and manage relationships with NIN/BVN integration.</p>
        </div>
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-shopping-basket"></i></div>
            <div class="w-feature-title">Paddy Purchases</div>
            <p class="w-feature-body">Record purchases with automatic weight, moisture and quality calculations. Real-time farmer credit ledger.</p>
        </div>
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-industry"></i></div>
            <div class="w-feature-title">Milling Batches</div>
            <p class="w-feature-body">Log every batch with input weight, output yield, husk and bran by-products. Track efficiency per machine.</p>
        </div>
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-boxes-stacked"></i></div>
            <div class="w-feature-title">Inventory Control</div>
            <p class="w-feature-body">Monitor stock levels across all varieties and grades. Smart low-stock alerts and expiry tracking.</p>
        </div>
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-receipt"></i></div>
            <div class="w-feature-title">Sales & Invoicing</div>
            <p class="w-feature-body">Create branded invoices, track payments, manage bulk orders and export to PDF in one click.</p>
        </div>
        <div class="w-feature-card" data-animate="up">
            <div class="w-feature-icon"><i class="fas fa-chart-pie"></i></div>
            <div class="w-feature-title">Reports & Analytics</div>
            <p class="w-feature-body">Profit & loss, efficiency ratios, seasonal trends — exportable reports for data-driven decisions.</p>
        </div>
    </div>
</section>

<!-- ═══════════ GALLERY ═══════════ -->
<section id="gallery" class="w-gallery">
    <div class="w-gallery-header">
        <span class="w-section-tag">Operations</span>
        <h2 class="w-section-title">From Field to Mill</h2>
        <p class="w-section-body">A glimpse into our premium paddy-to-rice operations.</p>
    </div>
    <div class="w-gallery-grid">
        <div class="w-gallery-item">
            <img src="/images/operations/farmer-collection.jpg" alt="Farmer collection point" loading="lazy" decoding="async">
            <div class="w-gallery-overlay"><span class="w-gallery-label">Paddy Collection</span></div>
        </div>
        <div class="w-gallery-item">
            <img src="/images/operations/harvest-season.jpg" alt="Harvest season" loading="lazy" decoding="async">
            <div class="w-gallery-overlay"><span class="w-gallery-label">Harvest Season</span></div>
        </div>
        <div class="w-gallery-item">
            <img src="/images/operations/milling-process.jpg" alt="Milling process" loading="lazy" decoding="async">
            <div class="w-gallery-overlay"><span class="w-gallery-label">Milling Operations</span></div>
        </div>
        <div class="w-gallery-item">
            <img src="/images/operations/quality-rice.jpg" alt="Quality rice" loading="lazy" decoding="async">
            <div class="w-gallery-overlay"><span class="w-gallery-label">Quality Rice</span></div>
        </div>
        <div class="w-gallery-item">
            <img src="/images/operations/rice-grains-closeup.jpg" alt="Rice grains closeup" loading="lazy" decoding="async">
            <div class="w-gallery-overlay"><span class="w-gallery-label">Grade A Grains</span></div>
        </div>
    </div>
</section>

<!-- ═══════════ PROCESS ═══════════ -->
<section id="process" class="w-process">
    <div class="w-process-header">
        <span class="w-section-tag">How It Works</span>
        <h2 class="w-section-title">The Zorin Milling Journey</h2>
    </div>
    <div class="w-process-grid stagger" id="process-grid">
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">01</div>
            <div class="w-step-title">Farmer Registration</div>
            <p class="w-step-desc">Onboard farmers with full profile, location and ID verification.</p>
        </div>
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">02</div>
            <div class="w-step-title">Paddy Purchase</div>
            <p class="w-step-desc">Record purchases with weight, moisture grade and automatic pricing.</p>
        </div>
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">03</div>
            <div class="w-step-title">Milling Batch</div>
            <p class="w-step-desc">Log each batch, track yield ratios and by-product weights.</p>
        </div>
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">04</div>
            <div class="w-step-title">Quality Check</div>
            <p class="w-step-desc">Grade milled rice, assign SKU and move to inventory.</p>
        </div>
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">05</div>
            <div class="w-step-title">Sale & Dispatch</div>
            <p class="w-step-desc">Invoice customers, track dispatch and confirm payment.</p>
        </div>
        <div class="w-process-step" data-animate="up">
            <div class="w-step-number">06</div>
            <div class="w-step-title">Reports</div>
            <p class="w-step-desc">Analyse profitability, efficiency and seasonal performance.</p>
        </div>
    </div>
</section>

<!-- ═══════════ TESTIMONIALS ═══════════ -->
<section id="testimonials" class="w-testimonials">
    <div class="w-testimonials-header">
        <span class="w-section-tag">Testimonials</span>
        <h2 class="w-section-title">Trusted by Millers Across the North</h2>
    </div>
    <div class="w-testimonials-grid stagger" id="testimonials-grid">
        <div class="w-testimonial-card" data-animate="up">
            <p class="w-testimonial-quote">Zorin transformed how we manage our paddy intake. We used to lose track of farmer payments — now everything is automatic and accurate.</p>
            <div class="w-testimonial-author">
                <div class="w-testimonial-avatar">AK</div>
                <div>
                    <div class="w-testimonial-name">Alhaji Kabir Musa</div>
                    <div class="w-testimonial-role">Kano Rice Mill, Kano State</div>
                </div>
            </div>
        </div>
        <div class="w-testimonial-card" data-animate="up">
            <p class="w-testimonial-quote">The milling batch tracking alone saved us thousands of naira monthly. We can now see exactly where yield losses happen and fix them.</p>
            <div class="w-testimonial-author">
                <div class="w-testimonial-avatar">IA</div>
                <div>
                    <div class="w-testimonial-name">Ibrahim Abubakar</div>
                    <div class="w-testimonial-role">Al-Amin Agro, Kaduna</div>
                </div>
            </div>
        </div>
        <div class="w-testimonial-card" data-animate="up">
            <p class="w-testimonial-quote">I tried two other systems before Zorin. Nothing comes close — the reports are clear, the interface is fast, and the support is excellent.</p>
            <div class="w-testimonial-author">
                <div class="w-testimonial-avatar">FM</div>
                <div>
                    <div class="w-testimonial-name">Fatima Mohammed</div>
                    <div class="w-testimonial-role">Sunrise Mills, Sokoto</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ FAQ ═══════════ -->
<section id="faq" class="w-faq">
    <div class="w-faq-header">
        <span class="w-section-tag">FAQ</span>
        <h2 class="w-section-title">Common Questions</h2>
    </div>
    <div class="w-faq-list" id="faq-list">
        <div class="w-faq-item">
            <button class="w-faq-trigger" aria-expanded="false">
                How many farmers can I register?
                <span class="w-faq-icon"><i class="fas fa-plus"></i></span>
            </button>
            <div class="w-faq-body"><p>There is no limit on farmer registrations. The platform is designed to handle thousands of farmer records with full purchase history and documentation.</p></div>
        </div>
        <div class="w-faq-item">
            <button class="w-faq-trigger" aria-expanded="false">
                Can I export reports to PDF or Excel?
                <span class="w-faq-icon"><i class="fas fa-plus"></i></span>
            </button>
            <div class="w-faq-body"><p>Yes. All reports — purchases, sales, milling efficiency, profit & loss — can be exported as PDF or Excel. Invoices are print-ready with your branding.</p></div>
        </div>
        <div class="w-faq-item">
            <button class="w-faq-trigger" aria-expanded="false">
                Does it work on mobile devices?
                <span class="w-faq-icon"><i class="fas fa-plus"></i></span>
            </button>
            <div class="w-faq-body"><p>Zorin is fully responsive and works on smartphones, tablets and desktops. Field staff can record paddy purchases on mobile at the collection point.</p></div>
        </div>
        <div class="w-faq-item">
            <button class="w-faq-trigger" aria-expanded="false">
                Is the data backed up automatically?
                <span class="w-faq-icon"><i class="fas fa-plus"></i></span>
            </button>
            <div class="w-faq-body"><p>All data is backed up daily to secure cloud storage. We maintain 30 days of rolling backups so your data is always safe and recoverable.</p></div>
        </div>
        <div class="w-faq-item">
            <button class="w-faq-trigger" aria-expanded="false">
                How long does setup take?
                <span class="w-faq-icon"><i class="fas fa-plus"></i></span>
            </button>
            <div class="w-faq-body"><p>Most mills are fully set up within 2 hours. We provide onboarding support to help you import existing farmer lists and configure your product catalogue.</p></div>
        </div>
    </div>
</section>

<!-- ═══════════ CTA ═══════════ -->
<section class="w-cta">
    <div class="w-cta-inner">
        <span class="w-section-tag">Get Started Today</span>
        <h2>Ready to Modernise<br>Your Mill?</h2>
        <p>Join over 40 rice mills across Northern Nigeria who trust Zorin to run their operations efficiently.</p>
        <div class="w-cta-btns">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-white">
                    <i class="fas fa-tachometer-alt"></i> Open Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-white">
                    <i class="fas fa-seedling"></i> Create Free Account
                </a>
                <a href="{{ route('login') }}" class="btn btn-white-outline">
                    Sign In <i class="fas fa-arrow-right"></i>
                </a>
            @endauth
        </div>
    </div>
</section>

<!-- ═══════════ FOOTER ═══════════ -->
<<footer class="w-footer">
    <div class="w-footer-top">
        <div class="w-footer-brand">
            <div class="w-footer-logo">ZOR<span>IN</span></div>
            <p>Premium rice milling management for Nigerian agro-processors. From paddy to polished grain — managed with precision.</p>
        </div>
        <div class="w-footer-col">
            <h4>Platform</h4>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="#process">How It Works</a></li>
                <li><a href="{{ route('register') }}">Get Started</a></li>
                <li><a href="{{ route('login') }}">Sign In</a></li>
            </ul>
        </div>
        <div class="w-footer-col">
            <h4>Company</h4>
            <ul>
                <li><a href="#about">About Us</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="w-footer-bottom">
        <span>© {{ date('Y') }} Zorin Rice Milling. All rights reserved.</span>
        <span>Made with <i class="fas fa-heart" style="color:var(--gold-light)"></i> in Kano, Nigeria</span>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {

    // ── Loader
    const loader = document.getElementById('zorin-loader');
    setTimeout(() => loader?.classList.add('hidden'), 1800);

    // ── Nav scroll state
    const nav = document.getElementById('w-nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });

    // ── Mobile nav toggle
    const toggle = document.getElementById('w-nav-toggle');
    const menu   = document.getElementById('w-nav-menu');
    toggle?.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('open');
        toggle.classList.toggle('open');
        toggle.setAttribute('aria-expanded', isOpen);
    });
    menu?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        toggle.classList.remove('open');
        menu.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
    }));

    // ── Intersection Observer for scroll animations
    const observe = (selector, cls = 'visible') => {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add(cls), i * 100);
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll(selector).forEach(el => io.observe(el));
    };
    observe('[data-animate]', 'visible');
    observe('.w-about-images', 'visible');
    observe('.w-about-text', 'visible');
    observe('.w-stat-item', 'visible');
    observe('.w-feature-card', 'visible');
    observe('.w-gallery-item', 'visible');
    observe('.w-process-step', 'visible');
    observe('.w-testimonial-card', 'visible');

    // ── Animated counters
    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        const suffix = el.getAttribute('data-suffix') || '';
        const dur = 1800;
        const step = target / (dur / 16);
        let current = 0;
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = Math.floor(current).toLocaleString() + suffix;
            if (current >= target) clearInterval(timer);
        }, 16);
    };
    const statsIO = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.querySelectorAll('.w-stat-number[data-target]').forEach(animateCounter);
                statsIO.unobserve(e.target);
            }
        });
    }, { threshold: 0.3 });
    const statsBand = document.getElementById('stats-band');
    if (statsBand) statsIO.observe(statsBand);

    // ── FAQ accordion
    document.querySelectorAll('.w-faq-trigger').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.w-faq-item');
            const isOpen = item.classList.contains('open');
            // Close all
            document.querySelectorAll('.w-faq-item').forEach(i => {
                i.classList.remove('open');
                i.querySelector('.w-faq-trigger')?.setAttribute('aria-expanded', 'false');
            });
            // Open clicked if it was closed
            if (!isOpen) {
                item.classList.add('open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });

});
</script>
</body>
</html>