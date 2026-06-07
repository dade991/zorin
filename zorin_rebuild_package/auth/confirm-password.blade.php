<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password — Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">

<div class="auth-page">
    <div class="auth-visual">
        <img src="/images/operations/paddy-fields.jpg" alt="Paddy fields">
        <div class="auth-visual-content">
            <div class="auth-logo">ZOR<span>IN</span></div>
            <div>
                <h2 class="auth-tagline">Secure Your <em>Account</em></h2>
                <p class="auth-tagline-sub">Please confirm your password before continuing.</p>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="/" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
            <h1 class="auth-form-title">Confirm Password</h1>
            <p class="auth-form-sub">This is a secure area. Please confirm your password to continue.</p>

            <form action="{{ route('password.confirm') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf
                <div>
                    <label for="password" class="auth-label">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                           class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="••••••••">
                    @error('password')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="auth-submit">
                    <span>Confirm <i class="fas fa-arrow-right"></i></span>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>