<x-guide-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guide Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <h3 class="text-lg font-medium text-gray-900">Selamat Datang, {{ Auth::user()->name }}!</h3>
        <p class="mt-1 text-sm text-gray-600">
            Berikut adalah ringkasan aktivitas Anda.
        </p>

        <!-- Stats Cards -->
        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Icon -->
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Pekerjaan Disetujui
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{-- Data ini perlu Anda kirim dari controller --}}
                                    {{ $approvedCount ?? 0 }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Icon -->
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Menunggu Persetujuan
                                </dt>
                                <dd class="text-lg font-medium text-gray-900">
                                    {{-- Data ini perlu Anda kirim dari controller --}}
                                    {{ $pendingCount ?? 0 }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guide-layout>