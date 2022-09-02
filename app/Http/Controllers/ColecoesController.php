<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColecoesRequest;
use App\Http\Requests\UpdateColecoesRequest;
use App\Models\Colecoes;

class ColecoesController extends Controller
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
     * @param  \App\Http\Requests\StoreColecoesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColecoesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function show(Colecoes $colecoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Colecoes $colecoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColecoesRequest  $request
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColecoesRequest $request, Colecoes $colecoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colecoes $colecoes)
    {
        //
    }
}
