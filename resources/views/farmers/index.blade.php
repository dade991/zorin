@extends('layouts.app')

@section('title', 'Farmers - Zorin Rice Milling')

@section('content')
<div class="page-header">
    <h1 class="page-title">Farmers</h1>
    <p class="page-subtitle">Manage your farmer database and relationships</p>
    <a href="{{ route('farmers.create') }}" class="btn btn-primary">Add New Farmer</a>
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
    <div>
        <h2 class="text-xl font-semibold text-gray-900">Farmer List</h2>
    </div>

    @if ($farmers->isEmpty())
        <div class="text-center py-12">
            <p class="text-rice-500">No farmers found. Click "Add New Farmer" to get started.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-rice-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Phone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Village</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">State</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">ID Number</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Purchases</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($farmers as $farmer)
                    <tr class="hover:bg-rice-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $farmer->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $farmer->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $farmer->village }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $farmer->state }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $farmer->id_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-info-100 text-info-800">
                                {{ $farmer->paddyPurchases()->count() }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <a href="{{ route('farmers.show', $farmer) }}" class="text-info-600 hover:text-info-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('farmers.edit', $farmer) }}" class="text-rice-600 hover:text-rice-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('farmers.destroy', $farmer) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger-600 hover:text-danger-900" onclick="return confirm('Are you sure you want to delete this farmer?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $farmers->links() }}
        </div>
    @endif
</div>
@endsection