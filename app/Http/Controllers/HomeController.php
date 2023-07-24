<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use App\Models\VisiMisi;
use App\Models\Petugas;
use App\Models\kecamatan;
use App\Models\desa;
use App\Models\StatusPenanggulangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $laporan = LaporanBencana::count();
        $laporan_terkonfirmasi = LaporanBencana::where('confirmed', true)->count();
        $laporan_diproses = StatusPenanggulangan::where('status', 'Proses')->count();
        $laporan_selesai = StatusPenanggulangan::where('status', 'Selesai')->count();
        $laporan_ditolak = StatusPenanggulangan::where('status', 'Ditolak')->count();
        $latest = LaporanBencana::select('laporan_bencanas.*', 'users.nomor_telepon', 'status_penanggulangans.status', 'kecamatans.nama_kecamatan', 'desas.nama_desa')
            ->join('users', 'users.id', '=', 'laporan_bencanas.user_id')
            ->join('status_penanggulangans', 'status_penanggulangans.id', '=', 'laporan_bencanas.status_penanggulangan_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'laporan_bencanas.kecamatan_id')
            ->join('desas', 'desas.id', '=', 'laporan_bencanas.desa_id')
            ->orderByDesc('laporan_bencanas.created_at')
            ->limit(1)
            ->get();

// var_dump(json_encode($latest));

        return view('admin.index', compact('laporan', 'laporan_diproses', 'laporan_terkonfirmasi', 'laporan_selesai','laporan_ditolak', 'latest'));
    }

    // public function indexAdmins(Request $request)
    // {
    //     $laporanBencana = DB::table('laporan_bencanas')
    //         ->select('laporan_bencanas.*', 'users.nomor_telepon', 'status_penanggulangans.status', 'kecamatans.nama_kecamatan', 'desas.nama_desa')
    //         ->join('users', 'users.id', '=', 'laporan_bencanas.user_id')
    //         ->join('status_penanggulangans', 'status_penanggulangans.id', '=', 'laporan_bencanas.status_penanggulangan_id')
    //         ->join('kecamatans', 'kecamatans.id', '=', 'laporan_bencanas.kecamatan_id')
    //         ->join('desas', 'desas.id', '=', 'laporan_bencanas.desa_id')
    //         ->orderByDesc('laporan_bencanas.created_at')
    //         ->limit(1)
    //         ->get();

    //     $kecamatans = Kecamatan::all();
    //     return view('admin.index', compact('laporanBencana', 'kecamatans'));
    // }


    public function profile_bpbd()
{
    $visiMisi = VisiMisi::first();

    $petugas = Petugas::all();

    return view('public.profile.index', compact('visiMisi', 'petugas'));
}
}
