<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcessosRequest;
use App\Http\Requests\UpdateAcessosRequest;
use App\Models\Acessos;

class AcessosController extends Controller
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
     * @param \App\Http\Requests\StoreAcessosRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcessosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Acessos $acessos
     * @return \Illuminate\Http\Response
     */
    public function show(Acessos $acessos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Acessos $acessos
     * @return \Illuminate\Http\Response
     */
    public function edit(Acessos $acessos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAcessosRequest $request
     * @param \App\Models\Acessos $acessos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcessosRequest $request, Acessos $acessos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Acessos $acessos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acessos $acessos)
    {
        //
    }
}
