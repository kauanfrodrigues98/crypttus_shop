<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSangriasRequest;
use App\Http\Requests\UpdateSangriasRequest;
use App\Models\Sangrias;
use App\Services\SangriasServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SangriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $sangrias = SangriasServices::findAll();

        return view('sangrias.index')->with(['sangrias' => $sangrias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sangrias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSangriasRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSangriasRequest $request): RedirectResponse
    {
        $service = SangriasServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
        }

        return Response()->redirectToRoute('sangrias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sangrias $sangrias
     * @return \Illuminate\Http\Response
     */
    public function show(Sangrias $sangrias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sangrias $sangrias
     * @return \Illuminate\Http\Response
     */
    public function edit(Sangrias $sangrias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSangriasRequest $request
     * @param \App\Models\Sangrias $sangrias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSangriasRequest $request, Sangrias $sangrias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sangrias $sangrias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sangrias $sangrias)
    {
        //
    }
}
