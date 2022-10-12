<?php

namespace App\Repository\clientes;

use App\Repository\BaseRepository;

class ClientesRepository extends BaseRepository implements ClientesInterface
{
    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->model->select('id', 'nome', 'email', 'cpf', 'celular', 'data_nascimento')->get();
    }

    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->select('id', 'nome')
                ->where('nome', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->select('id', 'nome')->get();
    }
}
