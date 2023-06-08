<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\PeringatanDini;
use App\Http\Requests\StorePeringatanDiniRequest;
use App\Http\Requests\UpdatePeringatanDiniRequest;
use App\Http\Resources\PeringatanDinisResource;
use Illuminate\Http\Request;

class PeringatanDiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PeringatanDinisResource::collection(
            PeringatanDini::latest()->limit(1)->get()
        );
    }


    public function indexAdmin()
    {
       $peringatanDini = PeringatanDini::latest()->paginate(10);

        return view('admin.peringatan_dini.index', compact('peringatanDini'));
    }

    // public function indexAdmin()
    // {
    //     $peringatanDini = PeringatanDini::whereDate('created_at', '>', Carbon::now()->subDays(30))->paginate(10);

    //     return view('admin.peringatan_dini.index', compact('peringatanDini'));
    //     }


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
     * @param  \App\Http\Requests\StorePeringatanDiniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeringatanDiniRequest $request)
    {
        //
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required'
        ]);

        PeringatanDini::create([
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi
        ]);

        return back()->with('sukses', 'Peringatan Dini berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeringatanDini  $peringatanDini
     * @return \Illuminate\Http\Response
     */
    public function show(PeringatanDini $peringatanDini)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeringatanDini  $peringatanDini
     * @return \Illuminate\Http\Response
     */
    public function edit(PeringatanDini $peringatanDini)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeringatanDiniRequest  $request
     * @param  \App\Models\PeringatanDini  $peringatanDini
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeringatanDiniRequest $request, PeringatanDini $peringatanDini)
    {
        //
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required'
        ]);

        $peringatanDini = PeringatanDini::find($request->peringatan_id);

        if(!$peringatanDini) {
            return back()->with('gagal', 'Data Peringatan Dini tidak ditemukan');
        }

        $peringatanDini->update([
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi
        ]);

        return back()->with('sukses', 'Data Peringatan Dini berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeringatanDini  $peringatanDini
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeringatanDini $peringatanDini)
    {
        //
    }

    public function deleteAdmin($id)
    {
        $peringatanDini = PeringatanDini::find($id);

        if(!$peringatanDini) {
            return back()->with('gagal', 'Data Peringatan Dini tidak Ditemukan');
        }

        $peringatanDini->delete();

        return back()->with('sukses', 'Data peringatan dini berhasil dihapus');
    }
}
