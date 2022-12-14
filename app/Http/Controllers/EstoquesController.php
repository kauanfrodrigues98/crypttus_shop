<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstoquesRequest;
use App\Http\Requests\UpdateEstoquesRequest;
use App\Models\Estoques;
use App\Services\EstoquesServices;
use Symfony\Component\HttpFoundation\Request;

class EstoquesController extends Controller
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
     * @param \App\Http\Requests\StoreEstoquesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstoquesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Http\Response
     */
    public function show(Estoques $estoques)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Http\Response
     */
    public function edit(Estoques $estoques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateEstoquesRequest $request
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstoquesRequest $request, Estoques $estoques)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estoques $estoques)
    {
        //
    }

    public function temEstoque(Request $request)
    {
        return EstoquesServices::temEstoque($request);
    }
}
