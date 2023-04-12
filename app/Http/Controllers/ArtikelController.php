<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
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
        $artikel = Artikel::latest()->paginate(10);

        return view('admin.artikel.index', compact('artikel'));
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
     * @param  \App\Http\Requests\StoreArtikelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtikelRequest $request)
    {

    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);

        $file = $request->file('gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move('artikel', $nama_file);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_file,
            'user_id' => Auth::user()->id
        ]);

        if($artikel) {
            return back()->with('sukses', 'Artikel berhasil ditambahkan');
        }

        return back()->with('gagal', 'Artikel gagal ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtikelRequest  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        //
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $artikel = Artikel::find($request->artikel_id);

        if(!$artikel) {
            return back()->with('gagal', 'Artikel tidak ditemukan');
        }

        if($request->hasFile('gambar')) {

            $file_path = public_path() . '/artikel/' . $artikel->gambar;

            if(file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('gambar');

            $nama_file = time()."_".$file->getClientOriginalName();

            $file->move('artikel', $nama_file);

            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $nama_file
            ]);

            return back()->with('sukses', 'Artikel berhasil diubah');
        }

        $artikel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return back()->with('sukses', 'Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //
    }

    public function deleteAdmin($id)
    {
        $artikel = Artikel::find($id);

        if(!$artikel) {
            return back()->with('gagal', 'Artikel tidak ditemukan');
        }

        $artikel->delete();

        return back()->with('sukses', 'Artikel berhasil dihapus');
    }
}
