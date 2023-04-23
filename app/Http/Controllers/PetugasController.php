<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use Illuminate\Http\Request;

class PetugasController extends Controller
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
        $petugas = Petugas::latest()->paginate(10);

        return view('admin.visimisi.petugas', compact('petugas'));
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
     * @param  \App\Http\Requests\StorePetugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorePetugasRequest $request)
    // {
    //     //
    // }
    public function store(StorePetugasRequest $request)
    {
        //
    }

    public function addAdmin(StorePetugasRequest $request)
{
    $validatedData = $request->validated();

    $file = $request->file('gambar');
    $nama_file = time()."_".$file->getClientOriginalName();
    $file->move('petugas', $nama_file);

    $petugas = Petugas::create([
        'nama' => $validatedData['nama_add'],
        'jabatan' => $validatedData['jabatan_add'],
        'gambar' => $nama_file,
        'nomor' => $validatedData['Nomor_add']

    ]);

    if ($petugas) {
        return back()->with('sukses', 'Data Pengurus berhasil ditambahkan');
    }

    return back()->with('gagal', 'Data Pengurus gagal ditambahkan');
}
public function editAdmin($id)
    {
        $petugas = Petugas::find($id);

        if(!$petugas) {
            return back()->with('gagal', 'Data Pengurus tidak ditemukan');
        }

        return view('admin.visimisi.editpetugas', compact('petugas'));
    }


/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest $request
     * @param  \App\Models\Petugas  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, Petugas $petugas)
    {
        //
    }

    public function updateAdmin(Request $request,$id)
{
    $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'jabatan' => 'required'

    ]);

    $petugas = Petugas::find($id);

    if (!$petugas) {
        return back('gagal', 'Data Petugas tidak ditemukan');
    }

    if($request->hasFile('gambar')) {

        $file_path = public_path() . '/petugas/' . $petugas->gambar;

        if(file_exists($file_path)) {
            unlink($file_path);
        }

        $file = $request->file('gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move('petugas', $nama_file);

        $petugas->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'gambar' => $nama_file,
            'nomor' => $request->nomor
        ]);

        return redirect()->route('petugas.index')->with('sukses', 'Pengurus berhasil diubah');
    }

    $petugas->update([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'nomor' => $request->nomor
    ]);

    return redirect()->route('petugas.index')->with('sukses', 'Pengurus berhasil diubah');
}
/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
    }

public function deleteAdmin($id)
{
    $petugas = Petugas::find($id);

    if (!$petugas) {
        return back()->with('gagal', 'Data Petugas tidak ditemukan');
    }

    $deleted = $petugas->delete();

    if ($deleted) {
        return back()->with('sukses', 'Data Pengurus berhasil dihapus');
    }

    return back()->with('gagal', 'Data Pengurus gagal dihapus');
}
}

