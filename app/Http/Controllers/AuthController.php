<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'user') {
                return redirect()->route('public');
            }

            return redirect()->route('home');
        }

        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Username/Email yang anda isi tidak tepat! Coba lagi!',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'password' => 'Password yang anda isi tidak tepat! Coba lagi!',
        ])->onlyInput('email');
    }

    public function registrasi()
    {
        return view('auth.register');
    }

    public function registrasiStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'nomor_telepon' => 'required|unique:users',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi.',
            'username.required' => 'Username harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'nomor_telepon.required' => 'Nomor telepon harus diisi.',
            'nomor_telepon.unique' => 'Nomor telepon sudah digunakan.',
            'password.required' => 'Password harus diisi.'
        ]);

        $validatedData = $request->all();

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user'
        ]);

        if ($user) {
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();

                if (Auth::user()->role == 'user') {
                    return redirect()->route('public');
                }

                return redirect()->route('home');
            }
        }

        return back()->with('gagal', 'Gagal menambahkan pengguna baru.');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/');

        //jika logout maka tidak akan langsung ke beranda 
        return redirect('login');
    }
}
