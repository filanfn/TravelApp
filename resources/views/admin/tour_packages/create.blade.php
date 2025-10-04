<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Tour Package
        </h2>
    </x-slot>

    <div class="flex justify-center items-center py-12 px-4 md:px-0">
    <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.tour-packages.store') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block">Title</label>
                            <input type="text" name="title" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Destination</label>
                            <select name="destination_id" class="w-full border rounded p-2" required>
                                @foreach(\App\Models\Destination::all() as $destination)
                                    <option value="{{ $destination->destination_id }}">{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block">Max Pax</label>
                            <input type="number" name="max_pax" class="w-full border rounded p-2" required>
                        </div>

                        <div class="col-span-2">
                            <label class="block">Description</label>
                            <textarea name="description" class="w-full border rounded p-2" required></textarea>
                        </div>

                        <div>
                            <label class="block">Base Price</label>
                            <input type="number" step="0.01" name="base_price" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Duration (days)</label>
                            <input type="number" name="duration_days" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Status</label>
                            <select name="status" class="w-full border rounded p-2">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" style="background:none;border:1px solid #0a0;color:#0a0;cursor:pointer;padding:6px 16px;margin-right:8px">Save</button>
                        <a href="{{ route('admin.tour-packages.index') }}" style="color:#555;text-decoration:underline;margin-right:8px">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
