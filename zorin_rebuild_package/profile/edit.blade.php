@extends('layouts.app')

@section('title', 'Profile — Zorin Rice Milling')
@section('page-title', 'Profile')

@section('content')

<div class="dash-welcome" style="margin-bottom:1.5rem;">
    <div class="dash-welcome-text">
        <h2>My Profile</h2>
        <p>Manage your account details and password</p>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-user-circle"></i> Account Information</span>
        </div>
        <div style="padding:1.5rem;">
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success" style="margin-bottom:1.25rem;">
                    <i class="fas fa-check-circle"></i> Profile updated successfully.
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}" style="display:flex;flex-direction:column;gap:1.25rem;">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                           class="form-input {{ $errors->get('name') ? 'is-invalid' : '' }}" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="form-input {{ $errors->get('email') ? 'is-invalid' : '' }}" required>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>
    </div>

    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-lock"></i> Change Password</span>
        </div>
        <div style="padding:1.5rem;">
            @if (session('status') === 'password-updated')
                <div class="alert alert-success" style="margin-bottom:1.25rem;">
                    <i class="fas fa-check-circle"></i> Password updated successfully.
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" style="display:flex;flex-direction:column;gap:1.25rem;">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" 
                           class="form-input {{ $errors->updatePassword->get('current_password') ? 'is-invalid' : '' }}">
                    @error('current_password', 'updatePassword')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" 
                           class="form-input {{ $errors->updatePassword->get('password') ? 'is-invalid' : '' }}">
                    @error('password', 'updatePassword')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-input">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                    <i class="fas fa-lock"></i> Update Password
                </button>
            </form>
        </div>
    </div>
</div>

@endsection