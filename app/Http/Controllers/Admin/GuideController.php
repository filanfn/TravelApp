<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GuideController extends Controller
{
    /**
     * Menampilkan daftar semua guide.
     */
    public function index()
    {
        // Ambil semua data guide beserta relasi user-nya
        $guides = Guide::with('user')->paginate(10);
        return view('admin.guides.index', compact('guides'));
    }

    /**
     * Menampilkan form untuk membuat guide baru.
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Menyimpan guide baru ke dalam database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'language' => 'required|string|max:50',
        ]);

        // 2. Buat akun User (logika dari seeder Anda)
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Anda bisa buat password acak dan kirim via email
        ]);

        // 3. Berikan role 'guide'
        $newUser->assignRole('guide');

        // 4. Buat profil Guide yang terhubung
        Guide::create([
            'user_id' => $newUser->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);

        // 5. Arahkan kembali ke halaman daftar guide dengan pesan sukses
        return redirect()->route('admin.guides.index')->with('success', 'Guide berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu guide (opsional, bisa Anda kembangkan).
     */
    public function show(Guide $guide)
    {
        // Biasanya untuk menampilkan halaman detail, tapi kita fokus ke edit
        return view('admin.guides.show', compact('guide'));
    }

    /**
     * Menampilkan form untuk mengedit data guide.
     */
    public function edit(Guide $guide)
    {
        // Memuat relasi user agar bisa diakses di form
        $guide->load('user');
        return view('admin.guides.edit', compact('guide'));
    }

    /**
     * Memperbarui data guide di dalam database.
     */
    public function update(Request $request, Guide $guide)
    {
        // 1. Validasi input dari form edit
        $request->validate([
            'name' => 'required|string|max:100',
            // Pastikan email unik, kecuali untuk user ini sendiri
            'email' => ['required', 'email', Rule::unique('users')->ignore($guide->user_id)],
            'phone' => 'required|string|max:20',
            'language' => 'required|string|max:50',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        // 2. Update data di tabel users
        $guide->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // 3. Update data di tabel guides
        $guide->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'language' => $request->language,
            'rating' => $request->rating,
        ]);

        // 4. Arahkan kembali dengan pesan sukses
        return redirect()->route('admin.guides.index')->with('success', 'Data guide berhasil diperbarui.');
    }

    /**
     * Menghapus guide dari database.
     */
    public function destroy(Guide $guide)
    {
        // Karena kita menggunakan onDelete('cascade') pada migrasi,
        // menghapus user akan otomatis menghapus profil guide yang terhubung.
        // Ini adalah cara yang lebih bersih.
        $guide->user->delete();

        return redirect()->route('admin.guides.index')->with('success', 'Guide berhasil dihapus.');
    }
}
