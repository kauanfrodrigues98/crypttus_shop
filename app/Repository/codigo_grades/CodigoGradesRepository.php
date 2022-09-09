<?php

namespace App\Repository\codigo_grades;

use Illuminate\Database\Eloquent\Model;

class CodigoGradesRepository implements CodigoGradesInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->model->select('id', 'codigo_grade', 'produtos_id', 'cores_id', 'tamanhos_id')->paginate(15);
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
