<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\GuideAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; // <-- Diperlukan untuk helper auth()
use Illuminate\View\View;
use Illuminate\Http\Request;


class JobController extends Controller
{
    /**
     * Menampilkan daftar pekerjaan (booking) yang tersedia.
     */
    public function index(): View
    {
        // Ambil semua booking yang ID-nya belum ada di tabel guide_assignments
        // Eager load relasi untuk menampilkan data di view
        $availableBookings = Booking::with(['customer', 'tourPackage'])
            ->whereDoesntHave('assignments', function ($query) {
                $query->where('status', 'approved');
            })
            ->latest('start_date')
            ->paginate(10);

        return view('guide.jobs.index', ['bookings' => $availableBookings]);
    }

    /**
     * Menangani permintaan untuk mengambil sebuah pekerjaan.
     */
    public function requestAssignment(Booking $booking): RedirectResponse
    {
        // Dapatkan user yang sedang login, lalu ambil profil guidenya
        $guide = Auth::user()->guideProfile;

        // Pastikan guide memiliki profil
        if (!$guide) {
            return redirect()->back()->with('error', 'Profil guide Anda tidak ditemukan.');
        }

        // Cek apakah guide ini sudah pernah request untuk booking ini
        $existingRequest = GuideAssignment::where('booking_id', $booking->booking_id)
            ->where('guide_id', $guide->guide_id)
            ->exists();

        if ($existingRequest) {
            return redirect()->back()->with('info', 'Anda sudah pernah meminta pekerjaan ini.');
        }

        // Buat assignment dengan status 'pending'
        GuideAssignment::create([
            'booking_id' => $booking->booking_id,
            'guide_id' => $guide->guide_id,
            'assigned_date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('guide.jobs.available')->with('success', 'Permintaan pekerjaan berhasil dikirim dan menunggu persetujuan admin.');
    }
}
