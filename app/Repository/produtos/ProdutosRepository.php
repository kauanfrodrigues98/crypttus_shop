<?php

namespace App\Repository\produtos;

use Illuminate\Database\Eloquent\Model;

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
            return $this->model->select('codigo', 'nome')
                ->where('codigo', 'LIKE', "%" . $search . "%")
                ->orWhere('nome', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->select('codigo', 'nome')->get();
    }
}
