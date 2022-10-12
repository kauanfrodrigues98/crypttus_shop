<?php

namespace App\Http\Controllers;

use App\Helpers\FuncoesHelpers;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Models\Clientes;
use App\Services\ClientesServices;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = ClientesServices::findAll();

        return view('clientes.index')->with(['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create')->with(['ufs' => FuncoesHelpers::ESTADOS_BRASILEIROS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientesRequest $request)
    {
        $service = ClientesServices::store($request);

        Session::flash('message', $service->getContent());

        if($service->getStatusCode() !== 200)
        {
            Session::flash('status', 'danger');
            return back()->withInput();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clientes $clientes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Clientes $clientes, int $id)
    {
        $cliente = $clientes->find($id);

        return view('clientes.update')->with(['clienteId' => $id, 'cliente' => $cliente, 'ufs' => FuncoesHelpers::ESTADOS_BRASILEIROS]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateClientesRequest $request
     * @param \App\Models\Clientes $clientes
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateClientesRequest $request)
    {
        $service = ClientesServices::update($request->clienteId, $request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('clientes.index');
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clientes $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }

    public function get(Request $request)
    {
        return ClientesServices::get($request);
    }
}
