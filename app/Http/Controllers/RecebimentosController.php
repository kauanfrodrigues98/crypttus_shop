<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecebimentosRequest;
use App\Http\Requests\UpdateRecebimentosRequest;
use App\Models\Recebimentos;
use App\Services\RecebimentosServices;
use Illuminate\Support\Facades\Session;

class RecebimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $recebimentos = RecebimentosServices::findAll();
        $dados['data_inicial'] = $_GET['data_inicial'] ?? date('d/m/Y');
        $dados['data_final'] = $_GET['data_final'] ?? date('d/m/Y');

        return view('recebimentos.index')->with(['recebimentos' => $recebimentos, 'data_inicial' => $dados['data_inicial'], 'data_final' => $dados['data_final']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('recebimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRecebimentosRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRecebimentosRequest $request)
    {
        $service = RecebimentosServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('recebimentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Http\Response
     */
    public function show(Recebimentos $recebimentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Recebimentos $recebimentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRecebimentosRequest $request
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecebimentosRequest $request, Recebimentos $recebimentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recebimentos $recebimentos)
    {
        //
    }
}
