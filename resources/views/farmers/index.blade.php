<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Farmers</h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">All Farmers</h3>
            <a href="{{ route('farmers.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Add Farmer
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Village</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($farmers as $farmer)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $farmer->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $farmer->phone ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $farmer->village ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('farmers.edit', $farmer) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('farmers.destroy', $farmer) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this farmer?')"
                                        class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">No farmers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $farmers->links() }}
        </div>

    </div>
</x-app-layout>
