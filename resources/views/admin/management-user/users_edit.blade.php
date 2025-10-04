<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Edit User</h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="gap-4 flex flex-col">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                palceholder="Masukkan Nama" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)"
                placeholder="Masukkan Email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Telepon')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)"
                placeholder="Masukkan Telepon" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Nationality -->
        <div>
            <x-input-label for="nationality" :value="__('Nationality')" />
            <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality"
                :value="old('nationality', $user->nationality)" placeholder="Masukkan Nationality" />
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>
        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full form-input rounded-md"
                placeholder="Pilih Role" required>
                <option value="admin" @if (old('role', $user->hasRole('admin') ? 'admin' : '') == 'admin') selected @endif>Admin</option>
                <option value="guide" @if (old('role', $user->hasRole('guide') ? 'guide' : '') == 'guide') selected @endif>Guide</option>
                <option value="user" @if (old('role', $user->hasRole('user') ? 'user' : '') == 'user') selected @endif>User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
            <span class="text-xs text-gray-500">(Kosongkan jika tidak ingin mengubah)</span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('admin.users.index') }}"
                class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Batal
            </a>
            <x-primary-button class="ml-4">
                {{ __('Update User') }}
            </x-primary-button>
        </div>
    </form>

</x-admin-layout>
