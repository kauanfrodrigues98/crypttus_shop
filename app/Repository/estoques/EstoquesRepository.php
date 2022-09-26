<?php

namespace App\Repository\estoques;

use App\Repository\BaseRepository;

class EstoquesRepository extends BaseRepository implements EstoquesInterface
{
    public function updateEstoque(array $dados)
    {
        return $this->model->where('codigo_grade', $dados['codigo_grade'])->update($dados);
    }
}
