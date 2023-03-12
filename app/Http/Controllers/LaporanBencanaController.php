<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use App\Http\Requests\StoreLaporanBencanaRequest;
use App\Http\Requests\UpdateLaporanBencanaRequest;
use App\Http\Resources\LaporanBencanasResource;
use App\Models\Korban;
use App\Models\StatusPenanggulangan;
use Illuminate\Support\Facades\Auth;

class LaporanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'status_penanggulangan_id' => $status_penanggulangan->id
        ]);

        return new LaporanBencanasResource($laporanBencana);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanBencana $laporanBencana)
    {
        //
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
    public function update(UpdateLaporanBencanaRequest $request, LaporanBencana $laporanBencana)
    {
        //
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
