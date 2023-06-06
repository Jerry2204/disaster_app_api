<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorekecamatanRequest;
use App\Http\Requests\UpdatekecamatanRequest;
use App\Http\Resources\kecamatanResource;
use Illuminate\Http\Request;
use App\Models\kecamatan;

class KecamatanController extends Controller
{
    public function indexAdmin()
    {
        $kecamatan = kecamatan::latest()->paginate(10);

        return view('admin.kecamatan.index', compact('kecamatan'));
    }
    public function store(StorekecamatanRequest $request)
    {
        $request->validated($request->all());

        $kecamatan = kecamatan::create([

            'nama_kecamatan' => $request->nama_kecamatan,

        ]);

        return new kecamatanResource($kecamatan);
    }

    public function addAdmin(StorekecamatanRequest $request)
    {
        $request->validated($request->all());

        kecamatan::create([

            'nama_kecamatan' => $request->nama_kecamatan

        ]);

        return redirect()->back()->with('sukses', 'Data Kecamatan Berhasil ditambahkan');
    }
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = kecamatan::find($id);

        if (!$kecamatan) {
            return $this->error('', 'Data Daerah Kecamatantidak ditemukan', 404);
        }

        return new kecamatansResource($kecamatan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = kecamatan::find($id);

        if (!$kecamatan) {
            return $this->error('', 'Data Daerah Kecamatan tidak ditemukan', 404);
        }

        return new kecamatansResource($kecamatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekecamatanRequest  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
       /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekecamatanRequest  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekecamatanRequest $request, $id)
    {
        $kecamatan = kecamatan::find($id);

        if(!$kecamatan) {
            return $this->error('', 'Data Kecamatan tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $kecamatan->update($request->all());

        return new kecamatansResource($kecamatan);
    }

    public function updateAdmin(UpdatekecamatanRequest $request)
    {
        $kecamatan = kecamatan::find($request->rawan_id);

        if(!$kecamatan) {
            return back()->with('gagal', 'Data tidak ditemukan');
        }

        $request->validated($request->all());

        $kecamatan->update($request->all());

        return back()->with('sukses', 'Data Kecamatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = kecamatan::find($id);

        if (!$kecamatan) {
            return $this->error('', 'Data Kecamatan tidak ditemukan', 404);
        }

        $kecamatan->delete();

        return $this->success('', 'Data Kecamatan Berhasil Dihapus', 200);
    }

    public function deleteAdmin($id)
    {
        $kecamatan = kecamatan::find($id);

        if (!$kecamatan) {
            return back()->with('gagal', 'Data Kecamatan Tidak Ditemukan');
        }

        $kecamatan->delete();

        return back()->with('sukses', 'Data Daerah Rawan Berhasil dihapus');
    }
}
