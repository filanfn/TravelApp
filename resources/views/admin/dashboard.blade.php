<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-700">Selamat Datang, {{ Auth::user()->name }}!</h3>
            <p class="text-gray-500">Berikut adalah ringkasan aktivitas di platform Anda.</p>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Total Pengguna</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $userCount ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Guides Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Total Guide</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $guideCount ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Bookings Card (Contoh) -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Total Booking</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $bookingCount ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions (Contoh) -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi Cepat</h3>
            <div class="flex space-x-4">
                <a href="{{ route('admin.guides.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Tambah Guide
                </a>
                <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Lihat Booking Baru
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>