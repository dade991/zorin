@extends('layouts.app')

@section('title', 'Add Farmer - Zorin Rice Milling')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Farmer</h1>
    <p class="page-subtitle">Register a new farmer in your database</p>
    <a href="{{ route('farmers.index') }}" class="btn btn-outline">Back to Farmers List</a>
</div>

@if (session('status'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <ul class="list-disc pl-5 mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <form action="{{ route('farmers.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Full Name
                </label>
                <input type="text" name="name" id="name" required
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    value="{{ old('name') }}" autocomplete="name">
                @error('name')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                    Phone Number
                </label>
                <input type="tel" name="phone" id="phone"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    value="{{ old('phone') }}" autocomplete="tel">
                @error('phone')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="village" class="block text-sm font-medium text-gray-700 mb-2">
                    Village
                </label>
                <input type="text" name="village" id="village"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    value="{{ old('village') }}">
                @error('village')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="state" class="block text-sm font-medium text-gray-700 mb-2">
                    State
                </label>
                <input type="text" name="state" id="state"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    value="{{ old('state') }}">
                @error('state')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="id_number" class="block text-sm font-medium text-gray-700 mb-2">
                    ID Number
                </label>
                <input type="text" name="id_number" id="id_number"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    value="{{ old('id_number') }}">
                @error('id_number')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                    Notes
                </label>
                <textarea name="notes" id="notes" rows="4"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-rice-500 focus:border-rice-500 text-sm"
                    >{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="px-6 py-2 bg-rice-600 text-white text-sm font-medium rounded-md hover:bg-rice-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rice-500 transition-colors">
                Add Farmer
            </button>
        </div>
    </form>
</div>
@endsection