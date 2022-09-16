<?php

namespace App\Repository\produtoVendas;

use Illuminate\Database\Eloquent\Model;

class ProdutoVendasRepository implements ProdutoVendasInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store(array $dados)
    {
        return $this->model->create($dados);
    }
}
