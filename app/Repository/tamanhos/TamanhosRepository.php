<?php

namespace App\Repository\tamanhos;

use Illuminate\Database\Eloquent\Model;

class TamanhosRepository implements TamanhosInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->model->select('id', 'codigo', 'tamanho', 'descricao')->get();
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
            return $this->model->select('codigo', 'tamanho')
                ->where('codigo', 'LIKE', "%" . $search . "%")
                ->orWhere('tamanho', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->select('codigo', 'tamanho')->get();
    }
}
