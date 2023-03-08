<?php

namespace App\Http\Controllers;

use App\Models\RawanBencana;
use App\Http\Requests\StoreRawanBencanaRequest;
use App\Http\Requests\UpdateRawanBencanaRequest;
use App\Http\Resources\RawanBencanasResource;

class RawanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RawanBencanasResource::collection(
            RawanBencana::all()
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
     * @param  \App\Http\Requests\StoreRawanBencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRawanBencanaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function show(RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawanBencanaRequest  $request
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawanBencanaRequest $request, RawanBencana $rawanBencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawanBencana  $rawanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawanBencana $rawanBencana)
    {
        //
    }
}
