<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormaPagamentosRequest;
use App\Http\Requests\UpdateFormaPagamentosRequest;
use App\Models\FormaPagamentos;

class FormaPagamentosController extends Controller
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
     * @param \App\Http\Requests\StoreFormaPagamentosRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormaPagamentosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FormaPagamentos $formaPagamentos
     * @return \Illuminate\Http\Response
     */
    public function show(FormaPagamentos $formaPagamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FormaPagamentos $formaPagamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(FormaPagamentos $formaPagamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFormaPagamentosRequest $request
     * @param \App\Models\FormaPagamentos $formaPagamentos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormaPagamentosRequest $request, FormaPagamentos $formaPagamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FormaPagamentos $formaPagamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormaPagamentos $formaPagamentos)
    {
        //
    }
}
