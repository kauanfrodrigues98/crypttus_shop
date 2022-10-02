<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColecoesRequest;
use App\Http\Requests\UpdateColecoesRequest;
use App\Models\Colecoes;
use App\Services\ColecoesServices;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class ColecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colecoes = ColecoesServices::findAll();

        return view('colecoes.index')->with(['colecoes' => $colecoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('colecoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreColecoesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreColecoesRequest $request)
    {
        $service = ColecoesServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('colecoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function show(Colecoes $colecoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Colecoes $colecoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColecoesRequest  $request
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColecoesRequest $request, Colecoes $colecoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Colecoes $colecoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colecoes $colecoes)
    {
        //
    }

    public function get(Request $request)
    {
        return ColecoesServices::get($request);
    }
}
