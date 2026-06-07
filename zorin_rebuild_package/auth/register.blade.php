<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — Zorin Rice Milling</title>
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
                <h2 class="auth-tagline">Join the Future of <em>Rice Milling</em></h2>
                <p class="auth-tagline-sub">Create an account to book milling services, track your rice, and get notified when your batch is complete.</p>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="/" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
            <h1 class="auth-form-title">Create account</h1>
            <p class="auth-form-sub">Set up your account — it's free.</p>

            <form action="{{ route('register') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf
                <div>
                    <label for="name" class="auth-label">Full Name</label>
                    <input id="name" name="name" type="text" required autocomplete="name"
                           class="auth-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" placeholder="Alhaji Musa Ibrahim">
                    @error('name')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="auth-label">Email Address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                           class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="you@email.com">
                    @error('email')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div>
                        <label for="password" class="auth-label">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="Min. 8 characters">
                        @error('password')
                            <span class="auth-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="auth-label">Confirm</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                               class="auth-input" placeholder="Repeat password">
                    </div>
                </div>
                <button type="submit" class="auth-submit" style="margin-top:0.25rem;">
                    <span>Create Account <i class="fas fa-seedling"></i></span>
                </button>
            </form>

            <div class="auth-divider">or</div>
            <p class="auth-switch">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>