<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Tambah User</h2>
    </x-slot>

    <form action="{{ route('admin.users.store') }}" method="POST" class="gap-4 flex flex-col">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                placeholder="Masukkan Nama" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                placeholder="Masukkan Email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Telepon')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                placeholder="Masukkan Telepon" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Nationality -->
        <div>
            <x-input-label for="nationality" :value="__('Nationality')" />
            <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality"
                placeholder="Masukkan Nationality" :value="old('nationality')" />
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>
        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full form-input rounded-md"
                placeholder="Pilih Role" required>
                <option value="admin" @if (old('role') == 'admin') selected @endif>Admin</option>
                <option value="guide" @if (old('role') == 'guide') selected @endif>Guide</option>
                <option value="user" @if (old('role') == 'user') selected @endif>User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>

</x-admin-layout>
