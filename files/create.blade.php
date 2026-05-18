{{-- FILE: resources/views/farmers/create.blade.php --}}
@extends('layouts.app')
@section('title','Add Farmer')
@section('page-title','Add Farmer')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Add New Farmer</div>
        <div class="page-subtitle">Fill in the farmer's details below</div>
    </div>
    <a href="{{ route('farmers.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('farmers.store') }}">
        @csrf
        <div class="form-section-title">Personal Information</div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Full Name *</label>
                <input type="text" name="name" class="crud-input @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Musa Ibrahim" required>
                @error('name')<div class="crud-error">{{ $message }}</div>@enderror
            </div>
            <div class="crud-group">
                <label class="crud-label">Phone Number</label>
                <input type="text" name="phone" class="crud-input" value="{{ old('phone') }}" placeholder="e.g. 08012345678">
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Village / Town</label>
                <input type="text" name="village" class="crud-input" value="{{ old('village') }}" placeholder="e.g. Gwale">
            </div>
            <div class="crud-group">
                <label class="crud-label">State</label>
                <input type="text" name="state" class="crud-input" value="{{ old('state') }}" placeholder="e.g. Kano">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">ID / NIN Number</label>
            <input type="text" name="id_number" class="crud-input" value="{{ old('id_number') }}" placeholder="Optional">
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:90px;resize:none;" placeholder="Any additional information...">{{ old('notes') }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Save Farmer</button>
            <a href="{{ route('farmers.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
