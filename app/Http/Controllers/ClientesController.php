<?php

namespace App\Http\Controllers;

use App\Helpers\FuncoesHelpers;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Models\Clientes;
use App\Notifications\ClientesNotification;
use App\Services\ClientesServices;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $clientes = ClientesServices::findAll();

        return view('clientes.index')->with(['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('clientes.create')->with(['ufs' => FuncoesHelpers::ESTADOS_BRASILEIROS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreClientesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreClientesRequest $request): RedirectResponse
    {
        $service = ClientesServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('clientes.index');
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clientes $clientes
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Clientes $clientes, int $id): View
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
    public function update(UpdateClientesRequest $request): RedirectResponse
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

    /**
     * @return \Illuminate\Http\Response
     */
    public function pdf(): Response
    {
        $clientes = ClientesServices::findAll();

        $data = [
            'title' => 'Relatório de Clientes',
            'date' => date('d/m/Y'),
            'clientes' => $clientes
        ];

        $pdf = PDF::loadView('clientes.pdf', $data);

        return $pdf->setPaper('A4')->stream('Relatorio_de_clientes_' . date('d/m/Y') . '.pdf');
    }
}
