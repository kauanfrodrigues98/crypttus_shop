<?php

namespace App\Repository\formaPagamentos;

use Illuminate\Database\Eloquent\Model;

class FormaPagamentosRepository implements FormaPagamentosInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function store(array $dados)
    {
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
        // TODO: Implement get() method.
    }
}
