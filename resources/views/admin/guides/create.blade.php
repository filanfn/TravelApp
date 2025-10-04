<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Guide Baru') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.guides.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telepon')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Language -->
        <div class="mt-4">
            <x-input-label for="language" :value="__('Bahasa')" />
            <x-text-input id="language" class="block mt-1 w-full" type="text" name="language" :value="old('language')" required />
            <x-input-error :messages="$errors->get('language')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('admin.guides.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Batal
            </a>
            <x-primary-button class="ml-4">
                {{ __('Simpan Guide') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>