<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use App\Models\VisiMisi;
use App\Models\Petugas;
use App\Models\StatusPenanggulangan;
use Carbon\Carbon;
use Illuminate\Http\Request; 
use Carbon\CarbonInterface;

class HomeController extends Controller
{
    public function index()
    {
        $laporan = LaporanBencana::count();
        $laporan_terkonfirmasi = LaporanBencana::where('confirmed', true)->count();
        $laporan_diproses = StatusPenanggulangan::where('status', 'Proses')->count();
        $laporan_selesai = StatusPenanggulangan::where('status', 'Selesai')->count();
        // $latest = LaporanBencana::get();
        $latest = LaporanBencana::latest()->get();

        return view('admin.index', compact('laporan', 'laporan_diproses', 'laporan_terkonfirmasi', 'laporan_selesai','latest'));
    }


    public function profile_bpbd()
    {
        $visiMisi = VisiMisi::all();
        $petugas = Petugas::all();

        return view('public.profile.index',compact('visiMisi','petugas'));
    }
}
