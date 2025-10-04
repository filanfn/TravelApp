<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tour Package Details
        </h2>
    </x-slot>

    <div class="flex justify-center items-center py-12 px-4 md:px-0">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-center mb-6">{{ $tourPackage->title }}</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div><strong>Title:</strong> {{ $tourPackage->title }}</div>
                    <div><strong>Destination:</strong> {{ $tourPackage->destination->name ?? '-' }}</div>
                    <div><strong>Max Pax:</strong> {{ $tourPackage->max_pax }}</div>
                    <div><strong>Description:</strong> {{ $tourPackage->description }}</div>
                    <div><strong>Base Price:</strong> Rp{{ number_format($tourPackage->base_price, 0, ',', '.') }}</div>
                    <div><strong>Duration (days):</strong> {{ $tourPackage->duration_days }}</div>
                    <div><strong>Status:</strong> {{ ucfirst($tourPackage->status) }}</div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('admin.tour-packages.edit', $tourPackage) }}" style="color:#e6b800;text-decoration:underline;margin-right:8px">Edit</a>
                    <a href="{{ route('admin.tour-packages.index') }}" style="color:#555;text-decoration:underline;margin-right:8px">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
