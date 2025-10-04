<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.management-user.users', compact('users'));
    }

    // Tampilkan form tambah user
    public function create()
    {
        return view('admin.management-user.users_create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'role' => 'required|in:admin,guide,user',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'password' => bcrypt($request->password),
        ]);
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.management-user.users_edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'role' => 'required|in:admin,guide,user',
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->nationality = $request->nationality;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
