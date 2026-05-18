<!DOCTYPE html>
<html lang="en" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In — Zorin</title>
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
        <img src="https://images.unsplash.com/photo-1536054348319-58a5ea05f4de?w=900&q=80" alt="Rice field">
        <div class="auth-visual-content">
            <a href="/" class="auth-logo">ZORIN<span>.</span></a>
            <div>
                <h2 class="auth-tagline">Welcome<br>back to<br><em>Zorin</em></h2>
                <p class="auth-tagline-sub">Your rice milling operations are running smoothly. Sign in to check your dashboard.</p>
            </div>
        </div>
    </div>

    {{-- RIGHT FORM --}}
    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="/" class="auth-back">← Back to Home</a>

            <div class="auth-form-title">Sign In</div>
            <p class="auth-form-sub">Enter your credentials to access your Zorin dashboard.</p>

            {{-- Session Status --}}
            @if (session('status'))
                <div style="background:var(--primary-pale);color:var(--primary);padding:0.85rem 1rem;border-radius:var(--radius-sm);font-size:0.85rem;font-weight:500;margin-bottom:1.25rem;border:1px solid var(--primary-light);">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="auth-input @error('email') is-invalid @enderror"
                        placeholder="you@yourmill.com">
                    @error('email')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="auth-input-group">
                    <label class="auth-label" for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="auth-input @error('password') is-invalid @enderror"
                        placeholder="••••••••">
                    @error('password')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember + Forgot --}}
                <div class="remember-row">
                    <label>
                        <input type="checkbox" name="remember" style="accent-color:var(--primary);">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="auth-submit">SIGN IN →</button>
            </form>

            <div class="auth-divider">or</div>

            <div class="auth-switch">
                Don't have an account?
                <a href="{{ route('register') }}">Create one free →</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
