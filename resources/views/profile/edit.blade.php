@extends('layouts.app')

@section('title', 'Profile — Zorin Rice Milling')
@section('page-title', 'Profile')

@section('content')

<div class="dash-welcome mb-6">
    <div class="dash-welcome-text">
        <h2>My Profile</h2>
        <p>Manage your account details and password</p>
    </div>
</div>

<div class="profile-grid">
    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-user-circle"></i> Account Information</span>
        </div>
        <div class="data-table-body">
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success mb-5" role="alert">
                    <i class="fas fa-check-circle"></i> Profile updated successfully.
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}" class="form-stack">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" 
                           class="form-input @error('name') is-invalid @enderror" required
                           aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                           aria-describedby="@error('name') name-error @enderror">
                    @error('name')
                        <span id="name-error" class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="form-input @error('email') is-invalid @enderror" required
                           aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                           aria-describedby="@error('email') email-error @enderror">
                    @error('email')
                        <span id="email-error" class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>
    </div>

    <div class="data-table-wrap">
        <div class="data-table-header">
            <span class="data-table-title"><i class="fas fa-lock"></i> Change Password</span>
        </div>
        <div class="data-table-body">
            @if (session('status') === 'password-updated')
                <div class="alert alert-success mb-5" role="alert">
                    <i class="fas fa-check-circle"></i> Password updated successfully.
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" class="form-stack">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input id="current_password" type="password" name="current_password" 
                           class="form-input @error('current_password', 'updatePassword') is-invalid @enderror"
                           aria-invalid="{{ $errors->updatePassword->has('current_password') ? 'true' : 'false' }}">
                    @error('current_password', 'updatePassword')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input id="password" type="password" name="password" 
                           class="form-input @error('password', 'updatePassword') is-invalid @enderror"
                           aria-invalid="{{ $errors->updatePassword->has('password') ? 'true' : 'false' }}">
                    @error('password', 'updatePassword')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-input">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-lock"></i> Update Password
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

<style>
.profile-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}
.mb-5 { margin-bottom: 1.25rem; }
.mb-6 { margin-bottom: 1.5rem; }
@media (max-width: 767px) {
    .profile-grid { grid-template-columns: 1fr; }
}
</style>