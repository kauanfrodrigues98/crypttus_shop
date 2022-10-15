<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    const ACESSOS = [
        'Funcionarios' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminFuncionarios',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioFuncionarios',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarFuncionarios',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarFuncionarios',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarFuncionarios',
            ]
        ],
        'Clientes' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminClientes',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioClientes',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarClientes',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarClientes',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarClientes',
            ]
        ],

        'Fornecedores' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminFornecedores',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioFornecedores',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarFornecedores',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarFornecedores',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarFornecedores',
            ]
        ],

        'Produtos' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminProdutos',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioProdutos',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarProdutos',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarProdutos',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarProdutos',
            ]
        ],

        'Tamanhos' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminTamanhos',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioTamanhos',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarTamanhos',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarTamanhos',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarTamanhos',
            ]
        ],

        'Cores' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminCores',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioCores',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarCores',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarCores',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarCores',
            ]
        ],

        'Codigo Grade' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminCodigoGrade',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioCodigoGrade',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarCodigoGrade',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarCodigoGrade',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarCodigoGrade',
            ]
        ],

        'Coleções' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminColecoes',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioColecoes',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarColecoes',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarColecoes',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarColecoes',
            ]
        ],

        'Recebimentos' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminRecebimentos',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioRecebimentos',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarRecebimentos',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarRecebimentos',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarRecebimentos',
            ]
        ],

        'Estoque' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminEstoque',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioEstoque',
            ],
            [
                'label' => 'Cadastrar',
                'value' => 'cadastrarEstoque',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarEstoque',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarEstoque',
            ]
        ],

        'Vendas' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminVendas',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioVendas',
            ],
            [
                'label' => 'Abrir Venda',
                'value' => 'cadastrarVendas',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarVendas',
            ],
            [
                'label' => 'Finalizar',
                'value' => 'finalizarVendas',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarVendas',
            ],
        ],

        'Sangrias' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminSangrias',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioSangrias',
            ],
            [
                'label' => 'Abrir Venda',
                'value' => 'cadastrarSangrias',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarSangrias',
            ],
            [
                'label' => 'Finalizar',
                'value' => 'finalizarSangrias',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarSangrias',
            ],
        ],

        'Despesas Avulsas' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminDespesasAvulsas',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioDespesasAvulsas',
            ],
            [
                'label' => 'Abrir Venda',
                'value' => 'cadastrarDespesasAvulsas',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarDespesasAvulsas',
            ],
            [
                'label' => 'Finalizar',
                'value' => 'finalizarDespesasAvulsas',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarDespesasAvulsas',
            ],
        ],

        'Suprimento Caixas' => [
            [
                'label' => 'Acesso Total',
                'value' => 'adminSuprimentoCaixas',
            ],
            [
                'label' => 'Relatório',
                'value' => 'relatorioSuprimentoCaixas',
            ],
            [
                'label' => 'Abrir Venda',
                'value' => 'cadastrarSuprimentoCaixas',
            ],
            [
                'label' => 'Atualizar',
                'value' => 'atualizarSuprimentoCaixas',
            ],
            [
                'label' => 'Finalizar',
                'value' => 'finalizarSuprimentoCaixas',
            ],
            [
                'label' => 'Deletar',
                'value' => 'deletarSuprimentoCaixas',
            ],
        ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
//        $this->authorize('view', User::class);

        $funcionarios = UserServices::findAll();

        return view('funcionarios.index')->with(['users' => $funcionarios]);
    }

    /**
     * Display the form
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('view', User::class);

        return view('funcionarios.create')->with(['acessos' => self::ACESSOS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $service = UserServices::store($request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('user.index');
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function show(int $id): View
    {
        $funcionario = UserServices::show($id);

        foreach ($funcionario->acessos->toArray() as $access) {
            $acessoAtual[] = $access['acesso'];
        }

        return view('funcionarios.update')->with(['user' => $funcionario, 'acessoAtual' => $acessoAtual, 'acessos' => self::ACESSOS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): RedirectResponse
    {
        $service = UserServices::update($request->userId, $request);

        Session::flash('message', $service->getContent());

        if ($service->getStatusCode() !== 200) {
            Session::flash('status', 'danger');
            return Response()->redirectToRoute('user.index');
        }

        return Response()->redirectToRoute('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logar(Request $request)
    {
        $service = UserServices::logar($request);

        if($service->getStatusCode() !== 200)
        {
            Session::flash('status', 'danger');
            Session::flash('message', $service->getContent());
            return back()->withInput($request->only(['usuario', 'senha']));
        }

        return Response()->redirectToRoute('home');
    }

    public function username()
    {
        return 'usuario';
    }

    public function logout()
    {
        Auth::logout();
        return Response()->redirectToRoute('login');
    }

    public function get(Request $request)
    {
        return UserServices::get($request);
    }
}
