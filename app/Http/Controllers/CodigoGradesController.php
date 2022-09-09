<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCodigoGradesRequest;
use App\Http\Requests\UpdateCodigoGradesRequest;
use App\Models\CodigoGrades;
use App\Services\CodigoGradesServices;
use Illuminate\Support\Facades\Session;

class CodigoGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $grades = CodigoGradesServices::findAll();

        return view('codigo_grade.index')->with(['grades' => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('codigo_grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCodigoGradesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCodigoGradesRequest $request)
    {
        $service = CodigoGradesServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('codigo_grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Http\Response
     */
    public function show(CodigoGrades $codigoGrades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Http\Response
     */
    public function edit(CodigoGrades $codigoGrades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCodigoGradesRequest $request
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCodigoGradesRequest $request, CodigoGrades $codigoGrades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodigoGrades $codigoGrades)
    {
        //
    }
}
