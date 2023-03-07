<?php

namespace App\Http\Controllers;

use App\Models\Korban;
use App\Http\Requests\StoreKorbanRequest;
use App\Http\Requests\UpdateKorbanRequest;

class KorbanController extends Controller
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
     * @param  \App\Http\Requests\StoreKorbanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKorbanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function show(Korban $korban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function edit(Korban $korban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKorbanRequest  $request
     * @param  \App\Models\Korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKorbanRequest $request, Korban $korban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Korban $korban)
    {
        //
    }
}
