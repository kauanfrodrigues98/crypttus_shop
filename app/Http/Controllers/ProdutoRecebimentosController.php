<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRecebimentosRequest;
use App\Http\Requests\UpdateProdutoRecebimentosRequest;
use App\Models\ProdutoRecebimentos;

class ProdutoRecebimentosController extends Controller
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
     * @param \App\Http\Requests\StoreProdutoRecebimentosRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutoRecebimentosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProdutoRecebimentos $produtoRecebimentos
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoRecebimentos $produtoRecebimentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProdutoRecebimentos $produtoRecebimentos
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoRecebimentos $produtoRecebimentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProdutoRecebimentosRequest $request
     * @param \App\Models\ProdutoRecebimentos $produtoRecebimentos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutoRecebimentosRequest $request, ProdutoRecebimentos $produtoRecebimentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProdutoRecebimentos $produtoRecebimentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoRecebimentos $produtoRecebimentos)
    {
        //
    }
}
