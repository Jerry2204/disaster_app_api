<?php

namespace App\Http\Controllers;

use App\Models\MitigasiBencana;
use App\Http\Requests\StoreMitigasiBencanaRequest;
use App\Http\Requests\UpdateMitigasiBencanaRequest;
use App\Http\Resources\MitigasiBencanasResource;
use Illuminate\Support\Facades\Auth;

class MitigasiBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MitigasiBencanasResource::collection(
            MitigasiBencana::all()
        );
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
     * @param  \App\Http\Requests\StoreMitigasiBencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMitigasiBencanaRequest $request)
    {
        $request->validated($request->all());

        $mitigasiBencana = MitigasiBencana::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'jenis_konten' => $request->jenis_konten,
            'file' => $request->file,
            'user_id' => Auth::user()->id
        ]);

        return new MitigasiBencanasResource($mitigasiBencana);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function show(MitigasiBencana $mitigasiBencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(MitigasiBencana $mitigasiBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitigasiBencanaRequest  $request
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMitigasiBencanaRequest $request, MitigasiBencana $mitigasiBencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(MitigasiBencana $mitigasiBencana)
    {
        //
    }
}