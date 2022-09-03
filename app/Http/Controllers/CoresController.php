<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoresRequest;
use App\Http\Requests\UpdateCoresRequest;
use App\Models\Cores;
use App\Services\CoresServices;
use Illuminate\Support\Facades\Session;

class CoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cores = CoresServices::findAll();

        return view('cores.index')->with(['cores' => $cores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCoresRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoresRequest $request)
    {
        $service = CoresServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('cores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cores $cores
     * @return \Illuminate\Http\Response
     */
    public function show(Cores $cores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cores $cores
     * @return \Illuminate\Http\Response
     */
    public function edit(Cores $cores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCoresRequest $request
     * @param \App\Models\Cores $cores
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoresRequest $request, Cores $cores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cores $cores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cores $cores)
    {
        //
    }
}
