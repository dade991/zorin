{{-- FILE: resources/views/farmers/index.blade.php --}}
@extends('layouts.app')
@section('title','Farmers')
@section('page-title','Farmers')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Farmer Records</div>
        <div class="page-subtitle">{{ $farmers->total() }} farmers registered</div>
    </div>
    <a href="{{ route('farmers.create') }}" class="btn btn-primary">+ Add Farmer</a>
</div>

<div class="dash-card">
    <div class="dash-card-header">
        <span class="dash-card-title">All Farmers</span>
    </div>
    <table class="dash-table">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Phone</th><th>Village</th><th>State</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($farmers as $f)
            <tr>
                <td style="color:var(--tx-m);">{{ $f->id }}</td>
                <td style="font-weight:600;">{{ $f->name }}</td>
                <td>{{ $f->phone ?? '—' }}</td>
                <td>{{ $f->village ?? '—' }}</td>
                <td>{{ $f->state ?? '—' }}</td>
                <td>
                    <div style="display:flex;gap:.5rem;">
                        <a href="{{ route('farmers.show', $f) }}" class="btn btn-sm btn-outline">View</a>
                        <a href="{{ route('farmers.edit', $f) }}" class="btn btn-sm btn-ghost">Edit</a>
                        <form method="POST" action="{{ route('farmers.destroy', $f) }}" onsubmit="return confirm('Delete this farmer?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:3rem;color:var(--tx-m);">No farmers yet. <a href="{{ route('farmers.create') }}" style="color:var(--p);">Add your first farmer →</a></td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:1rem 1.5rem;">{{ $farmers->links() }}</div>
</div>
@endsection
