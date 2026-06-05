<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-rice-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">#</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Farmer</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Weight (kg)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Price/kg</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Total Cost</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-rice-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($recentPurchases->isEmpty())
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-rice-500">No recent purchases found.</td>
                </tr>
            @else
                @foreach ($recentPurchases as $purchase)
                <tr class="hover:bg-rice-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $purchase->farmer->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($purchase->weight_kg, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($purchase->price_per_kg, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($purchase->total_cost, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $purchase->purchase_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <a href="{{ route('paddy-purchases.show', $purchase) }}" class="text-info-600 hover:text-info-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('paddy-purchases.edit', $purchase) }}" class="text-rice-600 hover:text-rice-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('paddy-purchases.destroy', $purchase) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger-600 hover:text-danger-900" onclick="return confirm('Are you sure you want to delete this purchase?')">
                                    <i class="fas fa-trash"></i>
                                }
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>