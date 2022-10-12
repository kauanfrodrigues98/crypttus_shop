<?php

namespace App\Repository\produtos;

use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProdutosRepository extends BaseRepository implements ProdutosInterface
{
    public function findAll()
    {
        return $this->model->select('id', 'codigo', 'nome', 'preco_compra', 'preco_venda', 'colecoes_id')->get();
    }

    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->select('codigo', 'nome')
                ->where('codigo', 'LIKE', "%" . $search . "%")
                ->orWhere('nome', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->select('codigo', 'nome')->limit(15)->get();
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

    public function show(int $id)
    {
        return $this->model->find($id);
    }

    public function localizarProduto(string $codigo)
    {
        return $this->model->select('id')->where('codigo', $codigo)->first();
    }
}
