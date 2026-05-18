{{-- FILE: resources/views/customers/edit.blade.php --}}
@extends('layouts.app')
@section('title','Edit Customer')
@section('page-title','Edit Customer')

@section('content')
<div class="page-header">
    <div><div class="page-title">Edit: {{ $customer->name }}</div></div>
    <a href="{{ route('customers.index') }}" class="btn btn-ghost">← Back</a>
</div>
<div class="form-card">
    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf @method('PUT')
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Full Name *</label>
                <input type="text" name="name" class="crud-input" value="{{ old('name', $customer->name) }}" required>
            </div>
            <div class="crud-group">
                <label class="crud-label">Phone</label>
                <input type="text" name="phone" class="crud-input" value="{{ old('phone', $customer->phone) }}">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">Email</label>
            <input type="email" name="email" class="crud-input" value="{{ old('email', $customer->email) }}">
        </div>
        <div class="crud-group">
            <label class="crud-label">Address</label>
            <textarea name="address" class="crud-input" style="height:80px;resize:none;">{{ old('address', $customer->address) }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('customers.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
