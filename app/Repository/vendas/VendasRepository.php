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
        return $this->model->select('id', 'clientes_id', 'users_id', 'desconto_real', 'desconto_perc', 'subtotal', 'total')->paginate(15);
    }

    public function store(array $dados)
    {
        // TODO: Implement store() method.
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
