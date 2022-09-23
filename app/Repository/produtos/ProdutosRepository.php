<?php

namespace App\Repository\produtos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdutosRepository implements ProdutosInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->model->select('id', 'codigo', 'nome', 'preco_compra', 'preco_venda', 'colecoes_id')->get();
    }

    public function store(array $dados)
    {
        // TODO: Implement store() method.
        return $this->model->create($dados);
    }

    public function update(int $id, array $dados)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }

    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->join('codigo_grades AS cg', 'cg.produtos_id', '=', 'produtos.id')
                ->join('cores as c', 'c.id', '=', 'cg.cores_id')
                ->join('tamanhos as t', 't.id', '=', 'cg.tamanhos_id')
                ->select(DB::raw('CONCAT(produtos.nome," ",c.cor," ",t.tamanho) AS descricao'), 'cg.codigo_grade AS codigo')
                ->where('produtos.codigo', 'LIKE', "%" . $search . "%")
                ->orWhere('produtos.nome', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->join('codigo_grades AS cg', 'cg.produtos_id', '=', 'produtos.id')
            ->join('cores as c', 'c.id', '=', 'cg.cores_id')
            ->join('tamanhos as t', 't.id', '=', 'cg.tamanhos_id')
            ->select(DB::raw('CONCAT(produtos.nome," ",c.cor," ",t.tamanho) AS descricao'), 'cg.codigo_grade AS codigo')->limit(15)->get();
    }

    public function getDetalhes(string $codigo)
    {
        return $this->model->join('codigo_grades AS cg', 'cg.produtos_id', '=', 'produtos.id')
            ->join('cores as c', 'c.id', '=', 'cg.cores_id')
            ->join('tamanhos as t', 't.id', '=', 'cg.tamanhos_id')
            ->select(DB::raw('CONCAT(produtos.nome," ",c.cor," ",t.tamanho) AS descricao'), 'cg.id', 'produtos.preco_venda', 'produtos.preco_compra', 'cg.codigo_grade')
            ->where(['cg.codigo_grade' => $codigo])
            ->first();
    }
}
