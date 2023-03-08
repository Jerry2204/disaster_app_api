<?php

namespace App\Http\Controllers;

use App\Models\RawanBencana;
use App\Http\Requests\StoreRawanBencanaRequest;
use App\Http\Requests\UpdateRawanBencanaRequest;
use App\Http\Resources\RawanBencanasResource;
use Illuminate\Support\Facades\Auth;

class RawanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RawanBencanasResource::collection(
            RawanBencana::all()
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
     * @param  \App\Http\Requests\StoreRawanBencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRawanBencanaRequest $request)
    {
        $request->validated($request->all());

        $rawanBencana = RawanBencana::create([
            'user_id' => Auth::user()->id,
            'nama_wilayah' => $request->nama_wilayah,
            'koordinat_lattitude' => $request->koordinat_lattitude,
            'koordinat_longitude' => $request->koordinat_longitude,
            'jenis_rawan_bencana' => $request->jenis_rawan_bencana,
            'level_rawan_bencana' => $request->level_rawan_bencana,
        ]);

        return new RawanBencanasResource($rawanBencana);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function show(RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawanBencanaRequest  $request
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawanBencanaRequest $request, RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawanBencana $rawanBencana)
    {
        //
    }
}