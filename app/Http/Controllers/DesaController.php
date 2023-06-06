<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoredesaRequest;
use App\Http\Requests\UpdatedesaRequest;
use App\Http\Resources\desaResource;
use Illuminate\Http\Request;
use App\Models\desa;
use App\Models\kecamatan;

class DesaController extends Controller
{
    public function indexAdmin()
    {
        $kecamatan = kecamatan::all();
        $desa = desa::paginate(10);

        return view('admin.desa.index', compact('kecamatan', 'desa'));

    }


    public function store(StoredesaRequest $request)
{
    $request->validated($request->all());

    $desa = desa::create([
        'nama_desa' => $request->nama_desa,
        'kecamatan_id' => $request->kecamatan_id
    ]);

    return new desaResource($desa);
}

public function addAdmin(StoredesaRequest $request)
{
    $request->validated($request->all());

    desa::create([
        'nama_desa' => $request->nama_desa,
        'kecamatan_id' => $request->kecamatan_id
    ]);

    return redirect()->back()->with('sukses', 'Data desa Berhasil ditambahkan');
}

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desa = desa::find($id);

        if (!$desa) {
            return $this->error('', 'Data Daerah desa tidak ditemukan', 404);
        }

        return new desasResource($desa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desa = desa::find($id);

        if (!$desa) {
            return $this->error('', 'Data Daerah desa tidak ditemukan', 404);
        }

        return new desasResource($desa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedesaRequest  $request
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
       /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedesaRequest  $request
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedesaRequest $request, $id)
    {
        $desa = desa::find($id);

        if(!$desa) {
            return $this->error('', 'Data desa tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $desa->update($request->all());

        return new desasResource($desa);
    }

    public function updateAdmin(UpdatedesaRequest $request)
    {
        $desa = desa::find($request->rawan_id);

        if(!$desa) {
            return back()->with('gagal', 'Data tidak ditemukan');
        }

        $request->validated($request->all());

        $desa->update($request->all());

        return back()->with('sukses', 'Data desa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desa = desa::find($id);

        if (!$desa) {
            return $this->error('', 'Data desa tidak ditemukan', 404);
        }

        $desa->delete();

        return $this->success('', 'Data desa Berhasil Dihapus', 200);
    }

    public function deleteAdmin($id)
    {
        $desa = desa::find($id);

        if (!$desa) {
            return back()->with('gagal', 'Data desa Tidak Ditemukan');
        }

        $desa->delete();

        return back()->with('sukses', 'Data Daerah Rawan Berhasil dihapus');
    }
}
