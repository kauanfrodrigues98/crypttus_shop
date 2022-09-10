<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendasRequest;
use App\Http\Requests\UpdateVendasRequest;
use App\Models\Vendas;
use App\Services\VendasServices;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vendas = VendasServices::findAll();

        return view('vendas.index')->with(['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('vendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreVendasRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function show(Vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendas $vendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateVendasRequest $request
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendasRequest $request, Vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
