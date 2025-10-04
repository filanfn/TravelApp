<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        $packages = TourPackage::with('destination')->paginate(10);
        return view('admin.tour_packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.tour_packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,destination_id',
            'title' => 'required|string|max:150',
            'max_pax' => 'required|integer|min:1',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'status' => 'required|string|max:100',
        ]);

        TourPackage::create($validated);

        return redirect()->route('admin.tour-packages.index')
                         ->with('success', 'Tour package berhasil ditambahkan!');
    }

    public function show(TourPackage $tourPackage)
    {
        return view('admin.tour_packages.show', compact('tourPackage'));
    }

    public function edit(TourPackage $tourPackage)
    {
        $destinations = \App\Models\Destination::all();
        return view('admin.tour_packages.edit', compact('tourPackage', 'destinations'));
    }

    public function update(Request $request, TourPackage $tourPackage)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,destination_id',
            'title' => 'required|string|max:150',
            'max_pax' => 'required|integer|min:1',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'status' => 'required|string|max:100',
        ]);

        $tourPackage->update($validated);

        return redirect()->route('admin.tour-packages.index')
                         ->with('success', 'Tour package berhasil diperbarui!');
    }

    public function destroy(TourPackage $tourPackage)
{
    // Pastikan relasi bookings ada di model TourPackage
    if ($tourPackage->bookings()->count() > 0) {
        // Jika ada booking, ubah status menjadi inactive
        $tourPackage->status = 'inactive';
        $tourPackage->save();

        return redirect()->route('admin.tour-packages.index')
                         ->with('info', 'Paket memiliki booking aktif. Status paket diubah menjadi INACTIVE.');
    }

    // Jika tidak ada booking, hapus paket
    $tourPackage->delete();

    return redirect()->route('admin.tour-packages.index')
                     ->with('success', 'Tour package berhasil dihapus!');
}

}
