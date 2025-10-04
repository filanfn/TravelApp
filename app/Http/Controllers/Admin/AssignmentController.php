<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignmentController extends Controller
{
    /**
     * Menampilkan daftar semua permintaan assignment guide yang masih pending.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Ambil semua assignment yang statusnya 'pending'.
        // Eager load relasi 'guide' dan 'booking' untuk menghindari N+1 query problem.
        // Eager load juga relasi 'user' dari guide dan 'tourPackage' dari booking untuk data tambahan.
        $pendingAssignments = GuideAssignment::with([
            'guide.user',
            'booking.customer',
            'booking.tourPackage'
        ])
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.assignments.index', [
            'assignments' => $pendingAssignments,
        ]);
    }

    /**
     * Menyetujui permintaan assignment.
     *
     * @param  \App\Models\GuideAssignment  $assignment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(GuideAssignment $assignment): RedirectResponse
    {
        // 1. Ubah status assignment yang dipilih menjadi 'approved'.
        $assignment->status = 'approved';
        $assignment->save();

        // 2. (PENTING) Tolak semua permintaan assignment lain untuk booking yang sama.
        // Ini untuk mencegah satu booking di-assign ke lebih dari satu guide.
        GuideAssignment::where('booking_id', $assignment->booking_id)
            ->where('id', '!=', $assignment->id) // Kecualikan assignment yang baru disetujui
            ->where('status', 'pending')
            ->update(['status' => 'rejected']);

        // (Opsional) Kirim notifikasi email ke guide bahwa permintaan mereka disetujui.
        // Mail::to($assignment->guide->user->email)->send(new AssignmentApproved($assignment));

        return redirect()->route('admin.assignments.requests')->with('success', 'Permintaan assignment berhasil disetujui.');
    }

    /**
     * Menolak permintaan assignment.
     *
     * @param  \App\Models\GuideAssignment  $assignment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(GuideAssignment $assignment): RedirectResponse
    {
        // Ubah status assignment menjadi 'rejected'.
        // Atau Anda bisa memilih untuk menghapusnya: $assignment->delete();
        $assignment->status = 'rejected';
        $assignment->save();

        // (Opsional) Kirim notifikasi email ke guide bahwa permintaan mereka ditolak.
        // Mail::to($assignment->guide->user->email)->send(new AssignmentRejected($assignment));

        return redirect()->route('admin.assignments.requests')->with('success', 'Permintaan assignment berhasil ditolak.');
    }
}
