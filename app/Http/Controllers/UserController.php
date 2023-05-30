<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function profile()
    {
        return view('admin.profile.edit');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if($request->password) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'nullable|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $request->validate([
                    'name' => 'required',
                    'username' => 'required',
                    'email' => 'required|email',
                    'password' => 'nullable|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                ]);

                $updated = $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                if($updated) {
                    Auth::logout();
                    return redirect()->route('login');
                }

                return back()->with('gagal', 'gagal memperbaharui profil');

                if($updated) {
                    return back()->with('sukses', 'Profil berhasil diperbaharui');
                }
            } else {
                return back()->with('old_password', 'Old password does not match!');
            }
        }

        $updated = $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        if($updated) {
            return back()->with('sukses', 'Profil berhasil diperbaharui');
        }

        return back()->with('gagal', 'gagal memperbaharui profil');
    }
}
