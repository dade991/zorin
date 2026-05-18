{{-- FILE: resources/views/farmers/edit.blade.php --}}
@extends('layouts.app')
@section('title','Edit Farmer')
@section('page-title','Edit Farmer')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Edit Farmer</div>
        <div class="page-subtitle">{{ $farmer->name }}</div>
    </div>
    <a href="{{ route('farmers.index') }}" class="btn btn-ghost">← Back</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('farmers.update', $farmer) }}">
        @csrf @method('PUT')
        <div class="form-section-title">Personal Information</div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Full Name *</label>
                <input type="text" name="name" class="crud-input @error('name') is-invalid @enderror" value="{{ old('name', $farmer->name) }}" required>
                @error('name')<div class="crud-error">{{ $message }}</div>@enderror
            </div>
            <div class="crud-group">
                <label class="crud-label">Phone Number</label>
                <input type="text" name="phone" class="crud-input" value="{{ old('phone', $farmer->phone) }}">
            </div>
        </div>
        <div class="crud-row">
            <div class="crud-group">
                <label class="crud-label">Village / Town</label>
                <input type="text" name="village" class="crud-input" value="{{ old('village', $farmer->village) }}">
            </div>
            <div class="crud-group">
                <label class="crud-label">State</label>
                <input type="text" name="state" class="crud-input" value="{{ old('state', $farmer->state) }}">
            </div>
        </div>
        <div class="crud-group">
            <label class="crud-label">ID / NIN Number</label>
            <input type="text" name="id_number" class="crud-input" value="{{ old('id_number', $farmer->id_number) }}">
        </div>
        <div class="crud-group">
            <label class="crud-label">Notes</label>
            <textarea name="notes" class="crud-input" style="height:90px;resize:none;">{{ old('notes', $farmer->notes) }}</textarea>
        </div>
        <div class="crud-actions">
            <button type="submit" class="btn btn-primary">Update Farmer</button>
            <a href="{{ route('farmers.show', $farmer) }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
