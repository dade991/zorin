<!DOCTYPE html>
<html lang="en" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — Zorin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<script>
    const t = localStorage.getItem('zorin-theme') || 'forest';
    document.documentElement.setAttribute('data-theme', t);
</script>

<div class="auth-page">
    {{-- LEFT VISUAL --}}
    <div class="auth-visual">
        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=900&q=80" alt="Rice harvest">
        <div class="auth-visual-content">
            <a href="/" class="auth-logo">ZORIN<span>.</span></a>
            <div>
                <h2 class="auth-tagline">Join the<br>smarter<br><em>harvest</em></h2>
                <p class="auth-tagline-sub">Create your free Zorin account and start managing your rice milling operation like a pro — in minutes.</p>
            </div>
        </div>
    </div>

    {{-- RIGHT FORM --}}
    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="/" class="auth-back">← Back to Home</a>

            <div class="auth-form-title">Create Account</div>
            <p class="auth-form-sub">Start your free Zorin account today — no credit card required.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="name">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="auth-input @error('name') is-invalid @enderror"
                        placeholder="Your full name">
                    @error('name')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="auth-input @error('email') is-invalid @enderror"
                        placeholder="you@yourmill.com">
                    @error('email')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="auth-input @error('password') is-invalid @enderror"
                        placeholder="At least 8 characters">
                    @error('password')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="auth-input"
                        placeholder="Repeat your password">
                </div>

                <button type="submit" class="auth-submit" style="margin-top:1rem;">CREATE ACCOUNT →</button>
            </form>

            <div class="auth-divider">or</div>

            <div class="auth-switch">
                Already have an account?
                <a href="{{ route('login') }}">Sign in →</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
