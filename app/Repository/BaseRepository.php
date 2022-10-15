<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->get();
    }

    public function store(array $dados)
    {
        return $this->model->create($dados);
    }

    public function update(int $id, array $dados)
    {
        return $this->model->find($id)->update($dados);
    }

    public function destroy(int $id)
    {
        return $this->model->where('user_id', $id)->delete();
    }
}
