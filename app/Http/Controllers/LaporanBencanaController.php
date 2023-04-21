<?php

namespace App\Http\Controllers;

use App\Events\ReportInserted;
use App\Models\LaporanBencana;
use App\Http\Requests\StoreLaporanBencanaRequest;
use App\Http\Requests\UpdateDampakBencanaRequest;
use App\Http\Requests\UpdateLaporanBencanaRequest;
use App\Http\Resources\LaporanBencanasResource;
use App\Models\KontakDarurat;
use App\Models\Korban;
use App\Models\StatusPenanggulangan;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        return LaporanBencanasResource::collection(
            LaporanBencana::all()
        );
    }

    public function indexAdmin()
    {
        $laporanBencana = LaporanBencana::latest()->paginate(10);

        return view('admin.laporan_bencana.index', compact('laporanBencana'));
    }

    public function bencanaAlam()
    {
        $bencanaAlam = LaporanBencana::where('jenis_bencana', 'bencana alam')->get();

        return view('public.bencanaAlam', compact('bencanaAlam'));
    }

    public function bencanaNonAlam()
    {
        $bencanaNonAlam = LaporanBencana::where('jenis_bencana', 'bencana non alam')->get();

        return view('public.bencanaNonAlam', compact('bencanaNonAlam'));
    }

    public function bencanaSosial()
    {
        $bencanaSosial = LaporanBencana::where('jenis_bencana', 'bencana sosial')->get();

        return view('public.bencanaSosial', compact('bencanaSosial'));
    }

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

        return new LaporanBencanasResource($laporanBencana);
    }

    public function publicStore(Request $request)
    {
        $request->validate([
            'jenis_bencana' => 'required',
            'nama_bencana' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required'
        ]);

        $korban = Korban::create([
            'user_id' => Auth::user()->id
        ]);

        $status_penanggulangan = StatusPenanggulangan::create([
            'user_id' =>  Auth::user()->id
        ]);

        $file = $request->file('gambar');

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
            'user_id' => Auth::user()->id
        ]);

        event(new ReportInserted($laporanBencana));

        return back()->with('sukses', 'Laporan Bencana berhasil ditambahkan');
    }

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

        $laporanBencana = LaporanBencana::create([
            'jenis_bencana' => $request->jenis_bencana,
            'nama_bencana' => $request->nama_bencana,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'status_bencana' => $request->status_bencana,
            'korban_id' => $korban->id,
            'gambar' => $nama_file,
            'status_penanggulangan_id' => $status_penanggulangan->id,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('sukses', 'Laporan Bencana berhasil ditambahkan');
    }

    public function publicAdd()
    {
        $kontakDarurat = KontakDarurat::all();

        return view('public.laporan_bencana.add', compact('kontakDarurat'));
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

        return new LaporanBencanasResource($laporanBencana);
    }

    public function detailAdmin($id)
    {
        $laporanBencana = LaporanBencana::find($id);

        if (!$laporanBencana) {
            return redirect()->route('laporan_bencana.index')->with('gagal', 'Data laporan bencana tidak ditemukan');
        }

        return view('admin.laporan_bencana.detail', compact('laporanBencana'));
    }

    public function detailPublic($id)
    {
        $laporanBencana = LaporanBencana::find($id);

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
    public function update(UpdateLaporanBencanaRequest $request, LaporanBencana $bencana)
    {
        $request->validated($request->all());

        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        $status_penanggulangan->update([
            'petugas' => $request->petugas,
            'keterangan' => $request->keterangan_penanggulangan,
            'tindakan' => $request->tindakan,
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ]);

        $bencana->update($request->all());

        $bencana->load(array('korban'));
        $bencana->load(array('status_penanggulangan'));

        return new LaporanBencanasResource($bencana);
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
                    'lokasi' => $request->lokasi,
                    'keterangan' => $request->keterangan,
                    'status_bencana' => $request->status_bencana,
                    'gambar' => $nama_file
                ]);

                return back()->with('sukses', 'Laporan Bencana berhasil diubah');
            } else {
                $bencana->update([
                    'jenis_bencana' => $request->jenis_bencana,
                    'nama_bencana' => $request->nama_bencana,
                    'lokasi' => $request->lokasi,
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

        if ($bencana) {

            $bencana->update([
                'confirmed' => true
            ]);

            $status_penanggulangan->update([
                'status' => 'diterima'
            ]);

            return redirect()->back()->with('sukses', 'Laporan dikonfirmasi');
        }

        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');

    }

    public function rejectAdmin($id)
    {
        $bencana = LaporanBencana::find($id);
        $status_penanggulangan = StatusPenanggulangan::find($bencana->status_penanggulangan->id);

        if ($bencana) {
            $bencana->update([
                'confirmed' => false
            ]);

            $status_penanggulangan->update([
                'status' => 'menunggu'
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
                'status' => 'proses',
                'petugas' => $request->petugas
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
                'status' => 'selesai',
                'keterangan' => $request->keterangan,
                'tindakan' => $request->tindakan
            ]);

            return redirect()->back()->with('sukses', 'Laporan Selesai');
        }

        return back()->with('gagal', 'Laporan Bencana tidak ditemukan');
    }

    public function updateDampakBencana(UpdateDampakBencanaRequest $request, LaporanBencana $bencana)
    {
        $request->validated($request->all());

        $korban = Korban::find($bencana->korban->id);

        $korban->update([
            'meninggal' => $request->meninggal,
            'luka_berat' => $request->luka_berat,
            'luka_ringan' => $request->luka_ringan,
            'hilang' => $request->hilang,
            'user_id' => Auth::user()->id
        ]);

        $bencana->load(array('korban'));
        $bencana->load(array('status_penanggulangan'));

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
}
