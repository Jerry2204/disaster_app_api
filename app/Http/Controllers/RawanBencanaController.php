<?php

namespace App\Http\Controllers;

use App\Models\RawanBencana;
use App\Http\Requests\StoreRawanBencanaRequest;
use App\Http\Requests\UpdateRawanBencanaRequest;
use App\Http\Resources\RawanBencanasResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        if(!Cache::has('rawan_bencana')) {
            Cache::put('rawan_bencana', RawanBencanasResource::collection(
                RawanBencana::all()
            ), now()->addMinutes(10));
        }

        return Cache::get('rawan_bencana');
    }

    public function indexAdmin()
    {
        $rawanBencana = RawanBencana::latest()->paginate(10);

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

    public function updateAdmin(UpdateRawanBencanaRequest $request)
    {
        $rawanBencana = RawanBencana::find($request->rawan_id);

        if(!$rawanBencana) {
            return back()->with('gagal', 'Data tidak ditemukan');
        }

        $request->validated($request->all());

        $rawanBencana->update($request->all());

        return back()->with('sukses', 'Data berhasil diubah');
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

    public function deleteAdmin($id)
    {
        $rawanBencana = RawanBencana::find($id);

        if (!$rawanBencana) {
            return back()->with('gagal', 'Data Daerah Rawan Bencana Tidak Ditemukan');
        }

        $rawanBencana->delete();

        return back()->with('sukses', 'Data Daerah Rawan Berhasil dihapus');
    }
}
