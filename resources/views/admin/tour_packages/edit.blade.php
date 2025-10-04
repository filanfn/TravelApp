<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center mb-6">
            Edit Tour Package
        </h2>
    </x-slot>

    <div class="flex justify-center items-center py-12 px-4 md:px-0">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.tour-packages.update', $tourPackage) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block">Title</label>
                            <input type="text" name="title" value="{{ $tourPackage->title }}" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Destination</label>
                            <select name="destination_id" class="w-full border rounded p-2" required>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->destination_id }}" {{ $tourPackage->destination_id == $destination->destination_id ? 'selected' : '' }}>{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block">Max Pax</label>
                            <input type="number" name="max_pax" value="{{ $tourPackage->max_pax }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="col-span-2">
                            <label class="block">Description</label>
                            <textarea name="description" class="w-full border rounded p-2" required>{{ $tourPackage->description }}</textarea>
                        </div>

                        <div>
                            <label class="block">Base Price</label>
                            <input type="number" name="base_price" value="{{ $tourPackage->base_price }}" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Duration (days)</label>
                            <input type="number" name="duration_days" value="{{ $tourPackage->duration_days }}" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block">Status</label>
                            <select name="status" class="w-full border rounded p-2">
                                <option value="active" {{ $tourPackage->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $tourPackage->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" style="background:none;border:1px solid #0a0;color:#0a0;cursor:pointer;padding:6px 16px;margin-right:8px">Update</button>
                        <a href="{{ route('admin.tour-packages.index') }}" style="color:#555;text-decoration:underline;margin-right:8px">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
