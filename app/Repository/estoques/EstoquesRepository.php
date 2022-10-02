<?php

namespace App\Repository\estoques;

use App\Repository\BaseRepository;

class EstoquesRepository extends BaseRepository implements EstoquesInterface
{
    public function updateEstoque(array $dados)
    {
        return $this->model->where('codigo_grade', $dados['codigo_grade'])->update($dados);
    }

    public function temEstoque(int $quantidade, string $codigo)
    {
        return $this->model->select('quantidade')->where('codigo_grade', '=', $codigo)->first();
    }
}
