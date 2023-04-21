<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Http\Resources\ArtikelsResource;
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
        return ArtikelsResource::collection(
            Artikel::all()
        );
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

    public function editAdmin($id)
    {
        $article = Artikel::find($id);

        if(!$article) {
            return back()->with('gagal', 'Data Artikel tidak ditemukan');
        }

        return view('admin.artikel.edit', compact('article'));
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

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $artikel = Artikel::find($id);

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

            return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diubah');
        }

        $artikel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diubah');
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

    public function ArtikelPublic($id)
    {
        $article = DB::table('artikels')
            ->select('artikels.*', 'users.name')
            ->join('users', 'users.id', '=', 'artikels.user_id')
            ->where('artikels.id', '=', $id)
            ->get();

        $selengkapnya = DB::table('artikels')
            ->select('artikels.*', 'users.name')
            ->join('users', 'users.id', '=', 'artikels.user_id')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        if (!$article) {
            return redirect()->route('laporan_bencana.index')->with('gagal', 'Data artikel tidak ditemukan');
        }

        return view('public.laporan_bencana.artikeldetail',compact('article', 'selengkapnya'));
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
