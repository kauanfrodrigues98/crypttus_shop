<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendasRequest;
use App\Http\Requests\UpdateVendasRequest;
use App\Models\Vendas;
use App\Services\VendasServices;
use Illuminate\Support\Facades\Session;

class VendasController extends Controller
{
    const FORMAS_PAGAMENTO = [
        'Dinheiro' => 'Dinheiro',
        'Crédito' => 'Crédito',
        'Débito' => 'Débito',
        'PIX' => 'PIX',
    ];

    const PARCELAS = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dados['data_inicial'] = $_GET['data_inicial'] ?? date('d/m/Y');
        $dados['data_final'] = $_GET['data_final'] ?? date('d/m/Y');

        $vendas = VendasServices::findAll($dados);

        return view('vendas.index')->with(
            [
                'vendas' => $vendas,
                'data_inicial' => $dados['data_inicial'],
                'data_final' => $dados['data_final'],
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('vendas.create')
            ->with(
                [
                    'formaPagamentos' => self::FORMAS_PAGAMENTO,
                    'parcelas' => self::PARCELAS,
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreVendasRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVendasRequest $request)
    {
        $service = VendasServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return back()->withInput($request->only(['usuario', 'senha']));
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('vendas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function show(Vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $venda = VendasServices::find($id);

        return view('vendas.edit')->with(
            [
                'venda' => $venda,
                'formaPagamentos' => self::FORMAS_PAGAMENTO,
                'parcelas' => self::PARCELAS,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateVendasRequest $request
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendasRequest $request, Vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
