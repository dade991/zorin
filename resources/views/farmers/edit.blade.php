<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Farmer</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <form method="POST" action="{{ route('farmers.update', $farmer) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $farmer->name) }}"
                           class="w-full border-gray-300 rounded shadow-sm focus:ring-green-500 focus:border-green-500">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $farmer->phone) }}"
                           class="w-full border-gray-300 rounded shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Village</label>
                    <input type="text" name="village" value="{{ old('village', $farmer->village) }}"
                           class="w-full border-gray-300 rounded shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="address" rows="3"
                              class="w-full border-gray-300 rounded shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('address', $farmer->address) }}</textarea>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Update Farmer
                    </button>
                    <a href="{{ route('farmers.index') }}" class="text-gray-500 hover:underline">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
