<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Http\Requests\StoreVisiMisiRequest;
use App\Http\Requests\UpdateVisiMisiRequest;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
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
        $visiMisi = VisiMisi::latest()->paginate(10);

        return view('admin.visimisi.index', compact('visiMisi'));
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
     * @param  \App\Http\Requests\StoreVisiMisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisiMisiRequest $request)
    {
        //
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $created = VisiMisi::create([
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        if ($created) {
            return back()->with('sukses', 'Visi dan Misi berhasil ditambahkan');
        }

        return back()->with('gagal', 'Visi dan Misi gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisiMisiRequest  $request
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisiMisiRequest $request, VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisi $visiMisi)
    {
        //
    }
}
