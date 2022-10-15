<?php

namespace App\Repository\users;

use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements UserInterface
{
    public function findAll(): Collection
    {
        // TODO: Implement findAll() method.
        return $this->model->select('id', 'nome', 'email', 'created_at')->get();
    }

    public function show(int $id)
    {
        return $this->model->find($id);
    }

    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->select('id', 'nome')
                ->where([['nome', 'LIKE', "%" . $search . "%"], ['id', '<>', 1]])
                ->get();
        }
        return $this->model->select('id', 'nome')->where('id', '<>', 1)->get();
    }

}
