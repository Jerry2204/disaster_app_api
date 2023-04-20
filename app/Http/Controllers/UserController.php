<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexAdmin()
    {
        $user = User::where('role', '!=', 'user')->paginate(10);

        return view('admin.users.index', compact('user'));
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'role' => 'required'
        ]);

        $password = 'BPBDKabToba' . Carbon::now()->format('Y') . "!";

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->role
        ]);

        if ($user) {
            return back()->with('sukses', 'Data petugas berhasil ditambahkan!');
        }

        return back()->with('gagal', 'Data user gagal ditambahkan!');
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'role' => 'required',
            'user_id' => 'required'
        ]);

        $user_id = $request->user_id;

        $user = User::find($user_id);

        if (!$user) {
            return back()->with('gagal', 'Data User tidak ditemukan');
        }

        $password = 'BPBDKabToba' . Carbon::now()->format('Y') . "!";

        $updated = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $password,
        ]);

        if ($updated) {
            return back()->with('sukses', 'Data Petugas berhasil diubah');
        }

        return back()->with('gagal', 'Data petugas gagal diubah');
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('gagal', 'Data User tidak ditemukan');
        }

        $deleted = $user->delete();

        if($deleted) {
            return back()->with('sukses', 'Data petugas berhasil dihapus');
        }

        return back()->with('gagal', 'Data petugas gagal dihapus');
    }
}
