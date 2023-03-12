<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use App\Http\Requests\StoreLaporanBencanaRequest;
use App\Http\Requests\UpdateDampakBencanaRequest;
use App\Http\Requests\UpdateLaporanBencanaRequest;
use App\Http\Resources\LaporanBencanasResource;
use App\Models\Korban;
use App\Models\StatusPenanggulangan;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

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
        return LaporanBencanasResource::collection(
            LaporanBencana::all()
        );
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
            'user_id' => Auth::user()->id,
        ]);

        $status_penanggulangan = StatusPenanggulangan::create([
            'user_id' => Auth::user()->id,
        ]);

        $laporanBencana = LaporanBencana::create([
            'jenis_bencana' => $request->jenis_bencana,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'status_bencana' => $request->status_bencana,
            'korban_id' => $korban->id,
            'status_penanggulangan_id' => $status_penanggulangan->id,
            'user_id' => Auth::user()->id,
        ]);

        return new LaporanBencanasResource($laporanBencana);
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
    public function destroy(LaporanBencana $laporanBencana)
    {
        //
    }
}
