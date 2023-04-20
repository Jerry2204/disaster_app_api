<?php

namespace App\Http\Controllers;

use App\Models\KontakDarurat;
use App\Http\Requests\StoreKontakDaruratRequest;
use App\Http\Requests\UpdateKontakDaruratRequest;
use Illuminate\Http\Request;

class KontakDaruratController extends Controller
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

    public function indexAdmin()
    {
        $kontakDarurat = KontakDarurat::latest()->paginate(10);

        return view('admin.kontak_darurat.index', compact('kontakDarurat'));
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
     * @param  \App\Http\Requests\StoreKontakDaruratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKontakDaruratRequest $request)
    {
        //
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'gambar' => 'required'
        ]);

        $file = $request->file('gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move('kontak', $nama_file);

        $kontakDarurat = KontakDarurat::create([
            'name' => $request->name,
            'nomor' => $request->nomor,
            'gambar' => $nama_file
        ]);

        if ($kontakDarurat) {
            return back()->with('sukses', 'Data Kontak Darurat berhasil ditambahkan');
        }

        return back()->with('gagal', 'Data Kontak Darurat gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KontakDarurat  $kontakDarurat
     * @return \Illuminate\Http\Response
     */
    public function show(KontakDarurat $kontakDarurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontakDarurat  $kontakDarurat
     * @return \Illuminate\Http\Response
     */
    public function edit(KontakDarurat $kontakDarurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKontakDaruratRequest  $request
     * @param  \App\Models\KontakDarurat  $kontakDarurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKontakDaruratRequest $request, KontakDarurat $kontakDarurat)
    {
        //
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'kontak_id' => 'required'
        ]);

        $kontak = KontakDarurat::find($request->kontak_id);

        if (!$kontak) {
            return back('gagal', 'Data kontak darurat tidak ditemukan');
        }

        if($request->hasFile('gambar')) {

            $file_path = public_path() . '/kontak/' . $kontak->gambar;

            if(file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('gambar');

            $nama_file = time()."_".$file->getClientOriginalName();

            $file->move('kontak', $nama_file);

            $kontak->update([
                'name' => $request->name,
                'nomor' => $request->nomor,
                'gambar' => $nama_file
            ]);

            return back()->with('sukses', 'Data kontak darurat berhasil diubah');
        }

        $kontak->update([
            'name' => $request->name,
            'nomor' => $request->nomor
        ]);

        return back()->with('sukses', 'Data kontak darurat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontakDarurat  $kontakDarurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontakDarurat $kontakDarurat)
    {
        //
    }

    public function deleteAdmin($id)
    {
        $kontak = KontakDarurat::find($id);

        if(!$kontak) {
            return back('gagal', 'Data Kontak Darurat tidak ditemukan');
        }

        $deleted = $kontak->delete();

        if ($deleted) {
            return back()->with('sukses', 'Data Kontak Darurat berhasil dihapus');
        }

        return back()->with('gagal', 'Data kontak darurat gagal dihapus');
    }
}
