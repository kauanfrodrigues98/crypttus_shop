<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Models\Produtos;
use App\Services\ProdutosServices;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = ProdutosServices::findAll();

        return view('produtos.index')->with(['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProdutosRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProdutosRequest $request)
    {

        $service = ProdutosServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back();
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosRequest  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutosRequest $request, Produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Produtos $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produtos)
    {
        ;
        //
    }

    public function get(Request $request)
    {
        return ProdutosServices::get($request);
    }

    public function getDetalhes(Request $request)
    {
        return ProdutosServices::getDetalhes($request);
    }
}
