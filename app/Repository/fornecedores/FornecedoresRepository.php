<?php

namespace App\Repository\fornecedores;

use App\Repository\BaseRepository;

class FornecedoresRepository extends BaseRepository implements FornecedoresInterface
{
    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->select('id', 'razao_social')
                ->where('razao_social', 'LIKE', "%" . $search . "%")
                ->orWhere('cnpj', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->select('id', 'razao_social')->get();
    }

    public function getDetalhes(string $id)
    {
        // TODO: Implement getDetalhes() method.
    }
}
