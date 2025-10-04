<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Tour Packages
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('admin.tour-packages.create') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Add Tour Packages
                    </a>
                </div>

                <table class="min-w-full border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border p-2">Title</th>
                            <th class="border p-2">Destination</th>
                            <th class="border p-2">Max Pax</th>
                            <th class="border p-2">Description</th>
                            <th class="border p-2">Base Price</th>
                            <th class="border p-2">Duration (days)</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages as $package)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border p-2 align-middle">{{ $package->title }}</td>
                                <td class="border p-2 align-middle">{{ $package->destination->name ?? '-' }}</td>
                                <td class="border p-2 align-middle">{{ $package->max_pax }}</td>
                                <td class="border p-2 align-middle">{{ Str::limit($package->description, 40) }}</td>
                                <td class="border p-2 align-middle">Rp{{ number_format($package->base_price, 0, ',', '.') }}</td>
                                <td class="border p-2 align-middle">{{ $package->duration_days }}</td>
                                <td class="border p-2 align-middle">{{ ucfirst($package->status) }}</td>
                                <td class="border p-2 align-middle">
                                    <span>
                                        <a href="{{ route('admin.tour-packages.show', $package->package_id) }}">Detail</a> |
                                        <a href="{{ route('admin.tour-packages.edit', $package->package_id) }}">Edit</a> |
                                        <form action="{{ route('admin.tour-packages.destroy', $package->package_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this package?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:none;border:none;color:#d00;cursor:pointer;padding:0">Delete</button>
                                        </form>
                                    </span>
                                </td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-gray-500">No tour packages available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $packages->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
