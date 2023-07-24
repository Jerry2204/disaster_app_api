<?php

namespace App\Http\Controllers;

use App\Events\ReportInserted;
use App\Models\LaporanBencana;
use App\Http\Requests\StoreLaporanBencanaRequest;
use App\Exports\LaporanBencanaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UpdateDampakBencanaRequest;
use App\Http\Requests\UpdateLaporanBencanaRequest;
use App\Http\Resources\LaporanBencanasResource;
use App\Models\Kerusakan;
use App\Models\KontakDarurat;
use App\Models\kecamatan;
use App\Models\desa;
use App\Models\Korban;
use App\Mail\Laporan;
use App\Models\StatusPenanggulangan;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormDataMail;
use App\Models\User;
use App\Notifications\DisasterReported;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use PDF;
use Image;
use Illuminate\Support\Facades\DB;

class LaporanBencanaController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $laporanBencana = LaporanBencana::all();

        if($laporanBencana->isEmpty()) {
            return $this->error('', 'Data Laporan Bencana tidak ditemukan', 404);
        }

        $laporanBencana->load(array('korban'));
        $laporanBencana->load(array('status_penanggulangan'));
        $laporanBencana->load(array('kerusakan'));

        return LaporanBencanasResource::collection(
            $laporanBencana
        );
    }
    public function exportPDF(Request $request)
{
    if ($request->input('start_date') == null || $request->input('end_date') == null) {

        $laporanBencanas = DB::table('laporan_bencanas')
            ->select('laporan_bencanas.*', 'korbans.*', 'kerusakans.*', 'desas.*', 'kecamatans.*')
            ->leftJoin('kerusakans', 'laporan_bencanas.id', '=', 'kerusakans.laporan_bencana_id')
            ->join('korbans', 'korbans.id', '=', 'laporan_bencanas.korban_id')
            ->join('desas', 'laporan_bencanas.desa_id', '=', 'desas.id')
            ->join('kecamatans', 'laporan_bencanas.kecamatan_id', '=', 'kecamatans.id')
            ->get();

        foreach ($laporanBencanas as $laporan) {
            $laporan->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $laporan->created_at)->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY, HH:mm:ss');
        }

        $content = 'Data Kebencanaan Toba/' . Carbon::now()->formatLocalized('%A %e %B %Y') . '';

        $pdf = PDF::loadView('admin.pdf.laporan', compact('laporanBencanas', 'content'))
            ->setOption('orientation', 'landscape');

        return $pdf->stream('Daftar Laporan Bencana.pdf');
    }

    $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
    $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();

    $laporanBencanas = DB::table('laporan_bencanas')
        ->select('laporan_bencanas.', 'korbans.', 'kerusakans.', 'desas.', 'kecamatans.*')
        ->leftJoin('kerusakans', 'laporan_bencanas.id', '=', 'kerusakans.laporan_bencana_id')
        ->join('korbans', 'korbans.id', '=', 'laporan_bencanas.korban_id')
        ->join('desas', 'laporan_bencanas.desa_id', '=', 'desas.id')
        ->join('kecamatans', 'laporan_bencanas.kecamatan_id', '=', 'kecamatans.id')
        ->whereBetween('laporan_bencanas.created_at', [$startDate, $endDate])
        ->get();

    foreach ($laporanBencanas as $laporan) {
        $laporan->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $laporan->created_at)->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY, HH:mm:ss');
    }

    $content = 'Data Kebencanaan Toba/' . Carbon::now()->formatLocalized('%A %e %B %Y') . '';

    $pdf = PDF::loadView('admin.pdf.laporan', compact('laporanBencanas', 'content'))
        ->setOption('orientation', 'landscape');

    return $pdf->stream('Daftar Laporan Bencana.pdf');
}



    public function indexAdmin(Request $request)
{
    // $jenisBencana = DB::table('laporan_bencanas')
    //     ->select('jenis_bencana')
    //     ->distinct()
    //     ->get();

    $laporanBencana = DB::table('laporan_bencanas')
    ->select('laporan_bencanas.*', 'users.nomor_telepon', 'status_penanggulangans.status', 'kecamatans.nama_kecamatan', 'desas.nama_desa')
    ->join('users', 'users.id', '=', 'laporan_bencanas.user_id')
    ->join('status_penanggulangans', 'status_penanggulangans.id', '=', 'laporan_bencanas.status_penanggulangan_id')
    ->join('kecamatans', 'kecamatans.id', '=', 'laporan_bencanas.kecamatan_id')
    ->join('desas', 'desas.id', '=', 'laporan_bencanas.desa_id')
    ->orderByDesc('laporan_bencanas.created_at')
    ->distinct();


    if ($request->has('jenis_bencana')) {
        $jenisBencanaFilter = $request->input('jenis_bencana');
        $laporanBencana = $laporanBencana->where('jenis_bencana', $jenisBencanaFilter);
    }
    if ($request->has('kecamatan_id')) {
        $kecamatanFilter = $request->input('kecamatan_id');
        $laporanBencana = $laporanBencana->where('nama_kecamatan', $kecamatanFilter);
    }


    $laporanBencana = $laporanBencana->paginate(10);
    $kecamatans = Kecamatan::all();
    return view('admin.laporan_bencana.index', compact('laporanBencana','kecamatans'));
}






    public function bencanaAlam()
    {
        $bencanaAlam = LaporanBencana::where('jenis_bencana', 'bencana alam')->where('confirmed', true)->latest()->paginate(12);

        return view('public.bencanaAlam', compact('bencanaAlam'));
    }
    public function indexPublic()
    {
        $bencanaAlam = LaporanBencana::where ('user_id',Auth::user()->id)->latest()->paginate(12);

        return view('public.laporan_bencana.laporanku', compact('bencanaAlam'));
    }

    public function bencanaNonAlam()
    {
        $bencanaNonAlam = LaporanBencana::where('jenis_bencana', 'bencana non alam')->where('confirmed', true)->latest()->paginate(12);

        return view('public.bencanaNonAlam', compact('bencanaNonAlam'));
    }

    public function bencanaSosial()
    {
        $now = Carbon::now();
        $bencanaSosial = LaporanBencana::where('jenis_bencana', 'bencana sosial')->where('confirmed', true)->latest()->paginate(12);
        $grafik = korban::all();
        // $count_grafik = korban::count();
        $now = date('Y');

$count_grafik = korban::select(
        korban::raw('SUM(meninggal) as meninggal_total'),
        korban::raw('SUM(luka_berat) as luka_berat_total'),
        korban::raw('SUM(luka_ringan) as luka_ringan_total'),
        korban::raw('SUM(hilang) as hilang_total'))
    ->join('laporan_bencanas', function($join) use ($now) {
        $join->on('korbans.id', '=', 'laporan_bencanas.id')
             ->where('laporan_bencanas.jenis_bencana', 'bencana sosial')
             ->where('laporan_bencanas.confirmed', true)
             ->whereYear('korbans.updated_at', $now);
    })
    ->get();

// $array_count_grafik = $count_grafik->toJSON();
// var_dump($array_count_grafik);

        return view('public.bencanaSosial', compact('bencanaSosial','grafik','count_grafik'));
    }
    //Grafik


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLaporanBencanaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreLaporanBencanaRequest $request)
    {
        $request->validated($request->all());

        $korban = Korban::create([
            'user_id' => $request->user_id,
        ]);


        $status_penanggulangan = StatusPenanggulangan::create([
            'user_id' => $request->user_id,
        ]);

        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move("laporan", $nama_file);

        $laporanBencana = LaporanBencana::create([
            'jenis_bencana' => $request->jenis_bencana,
            'nama_bencana' => $request->nama_bencana,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'status_bencana' => $request->status_bencana,
            'korban_id' => $korban->id,
            'gambar' => $nama_file,
            'status_penanggulangan_id' => $status_penanggulangan->id,
            'user_id' => $request->user_id,
        ]);

        $laporanBencana->load(array('korban'));
        $laporanBencana->load(array('status_penanggulangan'));

        return new LaporanBencanasResource($laporanBencana);
    }

    public function publicStore(Request $request)
    {
        $request->validate([
            'jenis_bencana' => 'required',
            'nama_bencana' => 'required',
            'desa_id' => 'required',
            'kecamatan_id' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // $kecamatans = Kecamatan::all();

        $users = User::where('role', 'admin')->orWhere('role', 'pra_bencana')->orWhere('role', 'tanggap_darurat')->orWhere('role', 'pasca_bencana')->get();

        $korban    = Korban::create([
            'user_id' => Auth::user()->id
        ]);

        $status_penanggulangan = StatusPenanggulangan::create([
            'user_id' =>  Auth::user()->id
        ]);

        $file = $request->file('gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move("laporan/", $nama_file);

        // $img = Image::make($file)->resize(800, 800)->save('laporan/' . $nama_file, 0);

        $laporanBencana = LaporanBencana::create([
            'jenis_bencana' => $request->jenis_bencana,
            'nama_bencana' => $request->nama_bencana,
            'desa_id' => $request->desa_id,
            'kecamatan_id' => $request->kecamatan_id,
            'keterangan' => $request->keterangan,
            'status_bencana' => $request->status_bencana,
            'korban_id' => $korban->id,
            'gambar' => $nama_file,
            'status_penanggulangan_id' => $status_penanggulangan->id,
            'user_id' => Auth::user()->id
        ]);
        // $kecamatans = Kecamatan::all();

        Carbon::setLocale('id');
        event(new ReportInserted($laporanBencana));
        Notification::send($users, new DisasterReported($laporanBencana));
        $authUser = Auth::user();
        $laporanBencana = $laporanBencana->toArray();
        Mail::send('public.mail', ['laporanBencana' => $laporanBencana,'authUser'=>$authUser], function($message) use ($authUser) {
            $message->to('samuelsimanjuntak194@gmail.com', 'Admin Tanggap Darurat')
                ->subject('Laporan Terjadi bencana dari ' . $authUser['name']);
        });

        return redirect()->route('laporanku.public')->with('sukses', 'Laporan Bencana berhasil ditambahkan');
    }


public function getDesaByKecamatan(Request $request)
{
    $kecamatanId = $request->input('kecamatan_id');
    $desas = Desa::where('kecamatan_id', $kecamatanId)->get();
    return response()->json($desas);
}

// public function addAdmin(StoreLaporanBencanaRequest $request)
// {
//     $validatedData = $request->validated();

//     $kecamatans = Kecamatan::all();

//     $korban = Korban::create([
//         'user_id' => Auth::user()->id,
//     ]);

//     $status_penanggulangan = StatusPenanggulangan::create([
//         'user_id' => Auth::user()->id,
//     ]);

//     // Handle file
//     $file = $request->file('file');
//     $nama_file = time()."_".$file->getClientOriginalName();
//     $file->move("laporan", $nama_file);

//     $users = User::whereIn('role', ['admin', 'pra_bencana', 'tanggap_darurat', 'pasca_bencana'])->get();

//     $laporanBencana = LaporanBencana::create([
//         'jenis_bencana' => $validatedData['jenis_bencana'],
//         'nama_bencana' => $validatedData['nama_bencana'],
//         'desa_id' => $validatedData['desa_id'],
//         'kecamatan_id' => $validatedData['kecamatan_id'],
//         'keterangan' => $validatedData['keterangan'],
//         'status_bencana' => $validatedData['status_bencana'],
//         'korban_id' => $korban->id,
//         'gambar' => $nama_file,
//         'status_penanggulangan_id' => $status_penanggulangan->id,
//         'user_id' => Auth::user()->id,
//     ]);

//     $kecamatans = kecamatan::all();

//     return view('admin.laporan_bencana.index', compact('laporanBencana', 'kecamatans'));
// }
public function addAdmin(StoreLaporanBencanaRequest $request)
{
    $request->validated($request->all());

    $korban = Korban::create([
        'user_id' => Auth::user()->id,
    ]);

    $status_penanggulangan = StatusPenanggulangan::create([
        'user_id' => Auth::user()->id,
    ]);

    // Handle file
    $file = $request->file('file');

    $nama_file = time()."_".$file->getClientOriginalName();

    $file->move("laporan", $nama_file);

    $users = User::where('role', 'admin')->orWhere('role', 'pra_bencana')->orWhere('role', 'tanggap_darurat')->orWhere('role', 'pasca_bencana')->get();

    $laporanBencana = LaporanBencana::create([
        'jenis_bencana' => $request->jenis_bencana,
        'nama_bencana' => $request->nama_bencana,
        'desa_id' => $request->desa_id,
        'kecamatan_id' => $request->kecamatan_id,
         'keterangan' => $request->keterangan,
        'status_bencana' => $request->status_bencana,
        'korban_id' => $korban->id,
        'gambar' => $nama_file,
        'status_penanggulangan_id' => $status_penanggulangan->id,
        'user_id' => Auth::user()->id,
    ]);
    return Redirect::back()->with('success', 'Data berhasil ditambahkan');
}



public function getDesaByKecamatanadmin(Request $request)
{
    $kecamatanId = $request->input('kecamatan_id');
    $desas = desa::where('kecamatan_id', $kecamatanId)->get();
    return response()->json($desas);
}
    public function publicAdd()
    {
        $kontakDarurat = KontakDarurat::all();
        $kecamatans = Kecamatan::all();



        return view('public.laporan_bencana.add', compact('kontakDarurat','kecamatans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporanBencana = LaporanBencana::find($id);

        if (!$laporanBencana) {
            return $this->error('', 'Data Laporan Bencana tidak ditemukan', 404);
        }

        $laporanBencana->load(array('korban'));
        $laporanBencana->load(array('status_penanggulangan'));
        $laporanBencana->load(array('kerusakan'));

        return new LaporanBencanasResource($laporanBencana);
    }

    public function detailAdmin($id)
    {
        $laporanBencana = LaporanBencana::select('laporan_bencanas.*', 'kecamatans.nama_kecamatan', 'desas.nama_desa')
            ->join('kecamatans', 'kecamatans.id', '=', 'laporan_bencanas.kecamatan_id')
            ->join('desas', 'desas.id', '=', 'laporan_bencanas.desa_id')
            ->find($id);

        if (!$laporanBencana) {
            return redirect()->route('laporan_bencana.index')->with('gagal', 'Data laporan bencana tidak ditemukan');
        }

        return view('admin.laporan_bencana.detail', compact('laporanBencana'));
    }
    // public function detailAdmin($id)
    // {
    //     $laporanBencana = LaporanBencana::find($id);

    //     if (!$laporanBencana) {
    //         return redirect()->route('laporan_bencana.index')->with('gagal', 'Data laporan bencana tidak ditemukan');
    //     }

    //     return view('admin.laporan_bencana.detail', compact('laporanBencana'));
    // }

    public function detailPublic($id)
    {
        $laporanBencana = LaporanBencana::select('laporan_bencanas.*', 'kecamatans.nama_kecamatan', 'desas.nama_desa')
            ->join('kecamatans', 'kecamatans.id', '=', 'laporan_bencanas.kecamatan_id')
            ->join('desas', 'desas.id', '=', 'laporan_bencanas.desa_id')
            ->find($id);

        if (!$laporanBencana) {
            return redirect()->route('laporan_bencana.index')->with('gagal', 'Data laporan bencana tidak ditemukan');
        }

        return view('public.laporan_bencana.detail', compact('laporanBencana'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanBencana $laporanBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanBencanaRequest  $request
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaporanBencanaRequest $request, $id)
    {
        $bencana = LaporanBencana::find($id);

        if (!$bencana) {
            return $this->error('', 'Data Laporan Bencana tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        $status_penanggulangan->update([
            'petugas' => $request->petugas,
            'keterangan' => $request->keterangan_penanggulangan,
            'tindakan' => $request->tindakan,
            'status' => $request->status,
            'user_id' => $request->user_id
        ]);

        $bencana->update($request->all());

        $bencana->load(array('korban'));
        $bencana->load(array('status_penanggulangan'));
        $bencana->load(array('kerusakan'));

        return new LaporanBencanasResource($bencana);
    }
public function getDesaByKecamatanedit(Request $request)
{
    $kecamatanId = $request->input('kecamatan_id');
    $desas = desa::where('kecamatan_id', $kecamatanId)->get();
    return response()->json($desas);
}
    public function updateAdmin(UpdateLaporanBencanaRequest $request)
    {
        $request->validated($request->all());

        $bencana = LaporanBencana::find($request->laporan_id);

        if ($bencana) {
            if ($request->hasFile('file')) {

                $file_path = public_path() . '/laporan/' . $bencana->gambar;

                if(file_exists($file_path)) {
                    unlink($file_path);
                }

                $file = $request->file('file');

                $nama_file = time()."_".$file->getClientOriginalName();

                $file->move('laporan', $nama_file);

                $bencana->update([
                    'jenis_bencana' => $request->jenis_bencana,
                    'nama_bencana' => $request->nama_bencana,
                    'desa_id' => $request->desa_id,
                    'kecamatan_id' => $request->kecamatan_id,
                    'keterangan' => $request->keterangan,
                    'status_bencana' => $request->status_bencana,
                    'gambar' => $nama_file
                ]);

                return back()->with('sukses', 'Laporan Bencana berhasil diubah');
            } else {
                $bencana->update([
                    'jenis_bencana' => $request->jenis_bencana,
                    'nama_bencana' => $request->nama_bencana,
                    'desa_id' => $request->desa_id,
                    'kecamatan_id' => $request->kecamatan_id,
                    'keterangan' => $request->keterangan,
                    'status_bencana' => $request->status_bencana
                ]);

                return back()->with('sukses', 'Laporan Bencana berhasil diubah');
            }
        }
        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');

    }

    public function confirmAdmin($id)
{
    $bencana = LaporanBencana::find($id);
    $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

    if ($bencana && $status_penanggulangan) {

        $bencana->update([
            'confirmed' => true
        ]);

        $status_penanggulangan->update([
            'status' => 'diterima'
        ]);
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        $status_penanggulangan->update([
            'penerima' => $user->name
        ]);

        $userWhoConfirmed = Auth::user()->name; // Mengambil nama user yang melakukan konfirmasi
        return redirect()->back()->with('sukses', 'Laporan dikonfirmasi oleh ' . $userWhoConfirmed);
    }

    return back()->with('gagal', 'Laporan Bencana tidak ditemukan');
}

    public function rejectAdmin(Request $request, $id)
    {
        $bencana = LaporanBencana::find($id);
        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        $validatedData = $request->validate([
            'alasan_penolakan' => 'required'
        ], [
            'alasan_penolakan.required' => 'Alasan penolakan harus diisi'
        ]);

        if ($bencana) {
            $status_penanggulangan->update([
                'confirmed' => 'proses',
                'alasan_penolakan' => $validatedData['alasan_penolakan'],
                'status' => 'Ditolak'
            ]);

            return redirect()->back()->with('sukses', 'Laporan ditolak');
        }


        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');
    }



    public function processAdmin(Request $request, $id)
    {
        $bencana = LaporanBencana::find($id);
        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        if ($bencana) {
            $status_penanggulangan->update([
                'status' => 'Proses',
                'petugas' => $request->petugas,
                'tindakan' => $request->tindakan

            ]);

            return redirect()->back()->with('sukses', 'Laporan diproses');
        }

        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');
    }

    public function completeAdmin(Request $request, $id)
    {
        $bencana = LaporanBencana::find($id);
        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        if ($bencana) {
            $status_penanggulangan->update([
                'petugas' => $request->petugas,
                'status' => 'Selesai',
                'keterangan' => $request->keterangan

            ]);

            return redirect()->back()->with('sukses', 'Laporan Selesai');
        }

        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');
    }

    public function updateDampakBencana(UpdateDampakBencanaRequest $request, $id)
    {
        $bencana = LaporanBencana::find($id);

        if(!$bencana) {
            return $this->error('', 'Data Laporan Bencana tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $korban = Korban::find($bencana->korban->id);

        $korban->update([
            'meninggal' => $request->meninggal,
            'luka_berat' => $request->luka_berat,
            'luka_ringan' => $request->luka_ringan,
            'hilang' => $request->hilang
        ]);

        if ($request->nama_infrastruktur) {
            $kerusakan_length = count($request->nama_infrastruktur);

            if ($bencana->kerusakan) {
                foreach ($bencana->kerusakan as $item) {
                    $item->delete();
                }
            }

            for ($i = 0; $i < $kerusakan_length; $i++) {
                Kerusakan::create([
                    'nama_infrastruktur' => $request->nama_infrastruktur[$i],
                    'rusak_ringan' => $request->rusak_ringan[$i],
                    'rusak_berat' => $request->rusak_berat[$i],
                    'laporan_bencana_id' => $bencana->id,
                    'user_id' => Auth::user()->id
                ]);
            }
        }

        $bencana->load(array('korban'));
        $bencana->load(array('status_penanggulangan'));
        $bencana->load(array('kerusakan'));

        return new LaporanBencanasResource($bencana);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporanBencana = LaporanBencana::find($id);

        if (!$laporanBencana) {
            return $this->error('', 'Data Laporan Bencana tidak ditemukan', 404);
        }

        $laporanBencana->delete();

        $laporanBencana->load(array('korban'));
        $laporanBencana->load(array('status_penanggulangan'));

        return $this->success('', 'Data Laporan Bencana Berhasil Dihapus', 200);
    }

    public function deleteAdmin($id)
    {
        $laporanBencana = LaporanBencana::find($id);

        if (!$laporanBencana) {
            return back()->with('gagal', 'Data Daerah Rawan Bencana Tidak Ditemukan');
        }

        $laporanBencana->delete();

        return back()->with('sukses', 'Data Laporan Bencana berhasil dihapus');
    }

    public function updateDampakBencanaAdmin($id)
    {
        $bencana = LaporanBencana::find($id);
        $kecamatans = Kecamatan::all();

        if (!$bencana) {
            return back()->with('gagal', 'Data Laporan Bencana tidak ditemukan');
        }

        return view('admin.dampak_bencana.update', compact('bencana','kecamatans'));
    }

    public function updateDampakBencanaAdminStore(Request $request, $id)
    {
        $bencana = LaporanBencana::find($id);

        if (!$bencana) {
            return back()->with('gagal', 'Data Laporan Bencana tidak ditemukan');
        }

        $korban = Korban::find($bencana->korban->id);

        $korban->update([
            'meninggal' => $request->meninggal,
            'luka_berat' => $request->luka_berat,
            'luka_ringan' => $request->luka_ringan,
            'hilang' => $request->hilang
            ]);
        if ($request->hasFile('gambar_kejadian')) {
            $files = $request->file('gambar_kejadian');
            $nama_file_kejadian = [];
            foreach ($files as $file) {
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move("laporan/", $nama_file);
                $nama_file_kejadian[] = $nama_file;
            }

            $laporan = LaporanBencana::where('user_id', $korban->user_id);
            $laporan->update([
                'gambar_kejadian' => json_encode($nama_file_kejadian)
            ]);
        }


        if ($request->hasFile('gambar_pasca')) {
            $files = $request->file('gambar_pasca');
            $nama_file_pasca = [];
            foreach ($files as $file) {
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move("laporan/", $nama_file);
                $nama_file_pasca[] = $nama_file;
            }

            $laporan = LaporanBencana::where('user_id', $korban->user_id);
            $laporan->update([
                'gambar_pasca' => json_encode($nama_file_pasca)
            ]);
        }

        if ($request->nama_infrastruktur) {
            $kerusakan_length = count($request->nama_infrastruktur);

            if ($bencana->kerusakan) {
                foreach ($bencana->kerusakan as $item) {
                    $item->delete();
                }
            }

            for ($i = 0; $i < $kerusakan_length; $i++) {
                Kerusakan::create([
                    'nama_infrastruktur' => $request->nama_infrastruktur[$i],
                    'rusak_ringan' => $request->rusak_ringan[$i],
                    'rusak_berat' => $request->rusak_berat[$i],
                    'laporan_bencana_id' => $bencana->id,
                    'user_id' => Auth::user()->id
                ]);
            }
        }

        return back()->with('sukses', 'Dampak Bencana berhasil ditambahkan');
    }

    public function markNotification(Request $request)
    {
        Auth::user()->unReadNotifications->when($request->input('id'), function ($query) use($request) {
            return $query->where('id', $request->input('id'));
        })->markAsRead();

        return redirect()->route('laporan_bencana.detail', $request->laporan_id);
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        return Excel::download(new LaporanBencanaExport($startDate, $endDate), 'Daftar Laporan Bencana.xlsx');
    }

}
