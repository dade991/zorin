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
        <img src="/images/operations/mill-operations.jpg" alt="Mill operations">
        <div class="auth-visual-content">
            <div class="auth-logo">ZOR<span>IN</span></div>
            <div>
                <h2 class="auth-tagline">Set a New <em>Password</em></h2>
                <p class="auth-tagline-sub">Choose a strong password to keep your account secure.</p>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="{{ route('login') }}" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to sign in
            </a>
            <h1 class="auth-form-title">Reset Password</h1>
            <p class="auth-form-sub">Create a new password for your account.</p>

            <form action="{{ route('password.store') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <div>
                    <label for="email" class="auth-label">Email Address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                           class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email', request()->email) }}" placeholder="you@email.com">
                    @error('email')
                        <span class="auth-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="auth-label">New Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                           class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Min. 8 characters">
                    @error('password')
                        <span class="auth-error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="auth-label">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                           class="auth-input" placeholder="Repeat password">
                </div>
                <button type="submit" class="auth-submit" style="margin-top:0.25rem;">
                    <span>Reset Password <i class="fas fa-check"></i></span>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>