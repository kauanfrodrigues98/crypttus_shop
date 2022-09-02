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
        return $this->model->get();
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
}
