<?php

namespace App\Repository\users;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
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

    public function findOne(int $id)
    {
        // TODO: Implement findOne() method.
    }
}
