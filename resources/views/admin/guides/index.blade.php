<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Guides') }}
        </h2>
    </x-slot>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.guides.create') }}" class="px-4 py-2 bg-indigo-600 text-black rounded-md hover:bg-indigo-700">
            Tambah Guide Baru
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Bahasa</th>
                    <th scope="col" class="px-6 py-3">Rating</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guides as $guide)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $guide->name }}
                    </th>
                    <td class="px-6 py-4">{{ $guide->user->email }}</td>
                    <td class="px-6 py-4">{{ $guide->phone }}</td>
                    <td class="px-6 py-4">{{ $guide->language }}</td>
                    <td class="px-6 py-4">{{ $guide->rating ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.guides.edit', $guide->guide_id) }}" class="font-medium text-blue-600 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.guides.destroy', $guide->guide_id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guide ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data guide.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $guides->links() }}
    </div>
</x-admin-layout>