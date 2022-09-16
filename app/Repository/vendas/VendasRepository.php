<?php

namespace App\Repository\vendas;

use Illuminate\Database\Eloquent\Model;

class VendasRepository implements VendasInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->select('id', 'clientes_id', 'user_id', 'desconto_real', 'desconto_perc', 'subtotal', 'total', 'status', 'created_at')
            ->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->paginate(15);
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
}
