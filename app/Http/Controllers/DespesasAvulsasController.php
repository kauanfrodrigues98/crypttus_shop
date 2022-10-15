<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDespesasAvulsasRequest;
use App\Http\Requests\UpdateDespesasAvulsasRequest;
use App\Models\DespesasAvulsas;

class DespesasAvulsasController extends Controller
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
     * @param \App\Http\Requests\StoreDespesasAvulsasRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDespesasAvulsasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DespesasAvulsas $despesasAvulsas
     * @return \Illuminate\Http\Response
     */
    public function show(DespesasAvulsas $despesasAvulsas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DespesasAvulsas $despesasAvulsas
     * @return \Illuminate\Http\Response
     */
    public function edit(DespesasAvulsas $despesasAvulsas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDespesasAvulsasRequest $request
     * @param \App\Models\DespesasAvulsas $despesasAvulsas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDespesasAvulsasRequest $request, DespesasAvulsas $despesasAvulsas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DespesasAvulsas $despesasAvulsas
     * @return \Illuminate\Http\Response
     */
    public function destroy(DespesasAvulsas $despesasAvulsas)
    {
        //
    }
}
