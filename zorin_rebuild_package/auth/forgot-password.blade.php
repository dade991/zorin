<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password — Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">

<div class="auth-page">
    <div class="auth-visual">
        <img src="/images/operations/rice-harvest.jpg" alt="Rice harvest">
        <div class="auth-visual-content">
            <div class="auth-logo">ZOR<span>IN</span></div>
            <div>
                <h2 class="auth-tagline">Recover Your <em>Account</em></h2>
                <p class="auth-tagline-sub">Enter your email and we'll send you a password reset link.</p>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="{{ route('login') }}" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to sign in
            </a>
            <h1 class="auth-form-title">Forgot Password?</h1>
            <p class="auth-form-sub">No worries — we'll send you reset instructions.</p>

            @if (session('status'))
                <div class="alert alert-success" style="margin-bottom:1.5rem;">
                    <i class="fas fa-check-circle"></i> {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf
                <div>
                    <label for="email" class="auth-label">Email Address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                           class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="you@email.com">
                    @error('email')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="auth-submit">
                    <span>Send Reset Link <i class="fas fa-paper-plane"></i></span>
                </button>
            </form>

            <p class="auth-switch">
                Remember your password? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>