<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTamanhosRequest;
use App\Http\Requests\UpdateTamanhosRequest;
use App\Models\Tamanhos;
use App\Services\TamanhosServices;
use Illuminate\Support\Facades\Session;

class TamanhosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamanhos = TamanhosServices::findAll();

        return view('tamanhos.index')->with(['tamanhos' => $tamanhos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tamanhos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTamanhosRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTamanhosRequest $request)
    {
        $service = TamanhosServices::store($request);

        Session::flash('message', $service->getContent());

        if (!$service) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('tamanhos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tamanhos $tamanhos
     * @return \Illuminate\Http\Response
     */
    public function show(Tamanhos $tamanhos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tamanhos $tamanhos
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamanhos $tamanhos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTamanhosRequest $request
     * @param \App\Models\Tamanhos $tamanhos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTamanhosRequest $request, Tamanhos $tamanhos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tamanhos $tamanhos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamanhos $tamanhos)
    {
        //
    }
}
