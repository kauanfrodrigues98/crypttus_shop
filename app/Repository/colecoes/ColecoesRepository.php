<?php

namespace App\Repository\colecoes;

use App\Repository\BaseRepository;

class ColecoesRepository extends BaseRepository implements ColecoesInterface
{
    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->select('id', 'nome')
                ->where('nome', 'LIKE', '%' . $search . '%')
                ->limit(15)
                ->get();
        }
        return $this->model->select('id', 'nome')->limit(15)->get();
    }
}
