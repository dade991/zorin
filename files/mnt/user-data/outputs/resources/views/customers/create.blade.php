{{-- FILE: resources/views/customers/create.blade.php --}}
@extends('layouts.app')
@section('title','Add Customer')
@section('page-title','Add Customer')

@section('content')
<div class="page-header">
    <div><div class="page-title">Add Customer</div></div>
    <a href="{{ route('customers.index') }}" class="btn btn-ghost">← Back</a>
</div>
<div class="form-card">
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Full Name *</label>
                <input type="text" name="name" class="crud-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<div class="crud-error">{{ $message }}</div>@enderror
            </div>
            <div class="crud-group">
                <label class="crud-label">Phone</label>
                <input type="text" name="phone" class="crud-input" value="{{ old('phone') }}">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Email</label>
            <input type="email" name="email" class="crud-input" value="{{ old('email') }}">
        </div>
        <div class="crud-group">
            <label class="crud-label">Address</label>
            <textarea name="address" class="crud-input" style="height:80px;resize:none;">{{ old('address') }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Save Customer</button>
            <a href="{{ route('customers.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
