<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoVendasRequest;
use App\Http\Requests\UpdateProdutoVendasRequest;
use App\Models\ProdutoVendas;

class ProdutoVendasController extends Controller
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
     * @param \App\Http\Requests\StoreProdutoVendasRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutoVendasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProdutoVendas $produtoVendas
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoVendas $produtoVendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProdutoVendas $produtoVendas
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoVendas $produtoVendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProdutoVendasRequest $request
     * @param \App\Models\ProdutoVendas $produtoVendas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutoVendasRequest $request, ProdutoVendas $produtoVendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProdutoVendas $produtoVendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoVendas $produtoVendas)
    {
        //
    }
}
