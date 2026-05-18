{{-- FILE: resources/views/customers/index.blade.php --}}
@extends('layouts.app')
@section('title','Customers')
@section('page-title','Customers')

@section('content')
<div class="page-header">
    <div><div class="page-title">Customers</div><div class="page-subtitle">{{ $customers->total() }} registered</div></div>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Add Customer</a>
</div>

<div class="dash-card">
    <table class="dash-table">
        <thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($customers as $c)
            <tr>
                <td style="font-weight:600">{{ $c->name }}</td>
                <td>{{ $c->phone ?? '—' }}</td>
                <td>{{ $c->email ?? '—' }}</td>
                <td>{{ $c->address ?? '—' }}</td>
                <td>
                    <div style="display:flex;gap:.5rem">
                        <a href="{{ route('customers.show',$c) }}" class="btn btn-sm btn-outline">View</a>
                        <a href="{{ route('customers.edit',$c) }}" class="btn btn-sm btn-ghost">Edit</a>
                        <form method="POST" action="{{ route('customers.destroy',$c) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:3rem;color:var(--tx-m)">No customers yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:1rem 1.5rem">{{ $customers->links() }}</div>
</div>
@endsection
