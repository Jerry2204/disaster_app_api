<?php

namespace App\Http\Controllers;

use App\Models\RawanBencana;
use App\Http\Requests\StoreRawanBencanaRequest;
use App\Http\Requests\UpdateRawanBencanaRequest;
use App\Http\Resources\RawanBencanasResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class RawanBencanaController extends Controller
{

    use HttpResponses;

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

    public function indexAdmin()
    {
        $rawanBencana = RawanBencana::all();

        return view('admin.rawan_bencana.index', compact('rawanBencana'));
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

    public function addAdmin(StoreRawanBencanaRequest $request)
    {
        $request->validated($request->all());

        RawanBencana::create([
            'user_id' => Auth::user()->id,
            'nama_wilayah' => $request->nama_wilayah,
            'koordinat_lattitude' => $request->koordinat_lattitude,
            'koordinat_longitude' => $request->koordinat_longitude,
            'jenis_rawan_bencana' => $request->jenis_rawan_bencana,
            'level_rawan_bencana' => $request->level_rawan_bencana,
        ]);

        return redirect()->back()->with('sukses', 'Data Rawan Bencana Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rawanBencana = RawanBencana::find($id);

        if (!$rawanBencana) {
            return $this->error('', 'Data Daerah Rawan Bencana tidak ditemukan', 404);
        }

        return new RawanBencanasResource($rawanBencana);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawanBencana = RawanBencana::find($id);

        if (!$rawanBencana) {
            return $this->error('', 'Data Daerah Rawan Bencana tidak ditemukan', 404);
        }

        return new RawanBencanasResource($rawanBencana);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawanBencanaRequest  $request
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawanBencanaRequest $request, $id)
    {
        $rawanBencana = RawanBencana::find($id);

        if(!$rawanBencana) {
            return $this->error('', 'Data Rawan Bencana tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $rawanBencana->update($request->all());

        return new RawanBencanasResource($rawanBencana);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rawanBencana = RawanBencana::find($id);

        if (!$rawanBencana) {
            return $this->error('', 'Data Daerah Rawan Bencana tidak ditemukan', 404);
        }

        $rawanBencana->delete();

        return $this->success('', 'Data Daerah Rawan Bencana Berhasil Dihapus', 200);
    }
}
