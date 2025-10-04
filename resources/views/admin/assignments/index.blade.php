<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permintaan Penugasan Guide') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Paket Tur</th>
                    <th scope="col" class="px-6 py-3">Pelanggan</th>
                    <th scope="col" class="px-6 py-3">Guide yang Meminta</th>
                    <th scope="col" class="px-6 py-3">Tanggal Permintaan</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assignments as $assignment)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{-- Akses nama paket tur melalui relasi bertingkat --}}
                        {{ $assignment->booking->tourPackage->title ?? 'N/A' }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $assignment->booking->customer->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $assignment->guide->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $assignment->guide->created_at ? $assignment->guide->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}
                    </td>
                    <td class="px-6 py-4 text-right flex items-center space-x-2">
                        {{-- Form untuk tombol Approve --}}
                        <form action="{{ route('admin.assignments.approve', $assignment) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui permintaan ini?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700">Approve</button>
                        </form>

                        {{-- Form untuk tombol Reject --}}
                        <form action="{{ route('admin.assignments.reject', $assignment) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak permintaan ini?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1 text-xs font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700">Reject</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada permintaan penugasan yang menunggu persetujuan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Link Pagination --}}
    <div class="mt-4">
        {{ $assignments->links() }}
    </div>
</x-admin-layout>