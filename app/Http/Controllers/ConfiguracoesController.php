<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfiguracoesRequest;
use App\Http\Requests\UpdateConfiguracoesRequest;
use App\Models\Configuracoes;

class ConfiguracoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configuracoes');
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
     * @param  \App\Http\Requests\StoreConfiguracoesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfiguracoesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuracoes  $configuracoes
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracoes $configuracoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuracoes  $configuracoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracoes $configuracoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConfiguracoesRequest  $request
     * @param  \App\Models\Configuracoes  $configuracoes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfiguracoesRequest $request, Configuracoes $configuracoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuracoes  $configuracoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracoes $configuracoes)
    {
        //
    }
}
