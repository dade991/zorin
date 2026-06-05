<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In — Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">

<div class="auth-page">

    <!-- ── Visual Side ── -->
    <div class="auth-visual">
        <img src="/images/operations/paddy-fields.jpg" alt="Paddy fields">
        <div class="auth-visual-content">
            <div class="auth-logo">ZOR<span>IN</span></div>
            <div>
                <h2 class="auth-tagline">Harvest the Power of <em>Smart</em> Milling</h2>
                <p class="auth-tagline-sub">
                    Manage your entire rice mill operation — from paddy procurement
                    to final sale — in one intelligent platform.
                </p>
            </div>
        </div>
    </div>

    <!-- ── Form Side ── -->
    <div class="auth-form-side">
        <div class="auth-form-wrap">

            <a href="{{ route('home') }}" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>

            <h1 class="auth-form-title">Welcome back</h1>
            <p class="auth-form-sub">Sign in to your Zorin account to continue.</p>

            @if (session('status'))
                <div class="alert alert-success" style="margin-bottom:1.5rem;">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf

                <div>
                    <label for="email" class="auth-label">Email Address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                           class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}"
                           placeholder="you@yourmill.com">
                    @error('email')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="auth-label">Password</label>
                    <div style="position:relative;">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                               class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="••••••••">
                        <button type="button" id="toggle-pass"
                                style="position:absolute;right:1rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:0.95rem;">
                            <i class="fas fa-eye" id="pass-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="remember-row">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                               style="accent-color:var(--primary);">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="auth-submit">
                    Sign In <i class="fas fa-arrow-right" style="margin-left:0.5rem;"></i>
                </button>
            </form>

            <div class="auth-divider">or</div>

            <p class="auth-switch">
                Don't have an account?
                <a href="{{ route('register') }}">Create one free</a>
            </p>

        </div>
    </div>
</div>

<script>
document.getElementById('toggle-pass')?.addEventListener('click', function () {
    const input = document.getElementById('password');
    const icon  = document.getElementById('pass-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fas fa-eye-slash';
    } else {
        input.type = 'password';
        icon.className = 'fas fa-eye';
    }
});
</script>

</body>
</html>