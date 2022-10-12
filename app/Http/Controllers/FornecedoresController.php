<?php

namespace App\Http\Controllers;

use App\Helpers\FuncoesHelpers;
use App\Http\Requests\StoreFornecedoresRequest;
use App\Http\Requests\UpdateFornecedoresRequest;
use App\Models\Fornecedores;
use App\Services\FornecedoresServices;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $fornecedores = FornecedoresServices::findAll();

        return view('fornecedores.index')->with(['fornecedores' => $fornecedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('fornecedores.create')->with(['ufs' => FuncoesHelpers::ESTADOS_BRASILEIROS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFornecedoresRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFornecedoresRequest $request)
    {
        $service = FornecedoresServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back()->withInput();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('fornecedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Fornecedores $fornecedores
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Fornecedores $fornecedores, int $id)
    {
        $fornecedor = $fornecedores->find($id);

        return view('fornecedores.update')->with(['fornecedorId' => $id, 'fornecedor' => $fornecedor, 'ufs' => FuncoesHelpers::ESTADOS_BRASILEIROS]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Fornecedores $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFornecedoresRequest $request
     * @param \App\Models\Fornecedores $fornecedores
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFornecedoresRequest $request)
    {
        $service = FornecedoresServices::update($request->fornecedorId, $request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('fornecedores.index');
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('fornecedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Fornecedores $fornecedores
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $service = FornecedoresServices::destroy($id);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('fornecedores.index');
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('fornecedores.index');
    }

    public function get(Request $request)
    {
        return FornecedoresServices::get($request);
    }
}
