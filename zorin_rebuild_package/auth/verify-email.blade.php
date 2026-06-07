<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email — Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="antialiased">

<div class="auth-page">
    <div class="auth-visual">
        <img src="/images/operations/quality-rice.jpg" alt="Quality rice">
        <div class="auth-visual-content">
            <div class="auth-logo">ZOR<span>IN</span></div>
            <div>
                <h2 class="auth-tagline">Verify Your <em>Email</em></h2>
                <p class="auth-tagline-sub">Almost there — just confirm your email address to get started.</p>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-form-wrap">
            <a href="/" class="auth-back">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
            <h1 class="auth-form-title">Verify Email</h1>
            <p class="auth-form-sub">Please check your inbox for the verification link we sent you.</p>

            @if (session('status'))
                <div class="alert alert-success" style="margin-bottom:1.5rem;">
                    <i class="fas fa-check-circle"></i> {{ session('status') }}
                </div>
            @endif

            <div style="background:var(--primary-pale);border:1px solid var(--border);border-radius:var(--radius-sm);padding:1.25rem;margin-bottom:1.5rem;">
                <p style="font-size:0.88rem;color:var(--text);line-height:1.7;margin:0;">
                    <i class="fas fa-envelope" style="color:var(--primary);margin-right:0.5rem;"></i>
                    Didn't receive the email? Click below and we'll send another one.
                </p>
            </div>

            <form method="POST" action="{{ route('verification.send') }}" style="display:flex;flex-direction:column;gap:1rem;">
                @csrf
                <button type="submit" class="auth-submit">
                    <span>Resend Email <i class="fas fa-redo"></i></span>
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" style="margin-top:1rem;">
                @csrf
                <button type="submit" class="btn btn-ghost" style="width:100%;justify-content:center;">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>