<x-guide-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pekerjaan Tersedia') }}
        </h2>
    </x-slot>

    <div class="space-y-4">
        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('info'))
        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg" role="alert">
            {{ session('info') }}
        </div>
        @endif

        @forelse($bookings as $booking)
        <div class="bg-white shadow sm:rounded-lg p-6 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-semibold text-indigo-600">{{ $booking->tourPackage->title ?? 'Judul Paket Tidak Tersedia' }}</h3>
                <div class="mt-2 text-sm text-gray-600 space-y-1">
                    <p><strong>Pelanggan:</strong> {{ $booking->customer->name ?? 'N/A' }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($booking->start_date)->format('d F Y') }}</p>
                    <p><strong>Jumlah Orang:</strong> {{ $booking->pax }}</p>
                </div>
            </div>
            <div class="ml-4">
                <form action="{{ route('guide.jobs.request', $booking) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Ambil Job Ini
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="bg-white shadow sm:rounded-lg p-6 text-center">
            <p class="text-gray-500">Saat ini tidak ada pekerjaan yang tersedia.</p>
        </div>
        @endforelse

        {{-- Pagination Links --}}
        <div class="mt-4">
            {{ $bookings->links() }}
        </div>
    </div>
</x-guide-layout>