<?php

namespace App\Repository\codigo_grades;

use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

class CodigoGradesRepository extends BaseRepository implements CodigoGradesInterface
{
    public function get(string $search)
    {
        if (!empty($search)) {
            return $this->model->join('produtos', 'codigo_grades.produtos_id', '=', 'produtos.id')
                ->join('cores as c', 'c.id', '=', 'codigo_grades.cores_id')
                ->join('tamanhos as t', 't.id', '=', 'codigo_grades.tamanhos_id')
                ->select(DB::raw('CONCAT(produtos.nome," ",c.cor," ",t.tamanho) AS descricao'), 'codigo_grades.codigo_grade AS codigo')
                ->where('produtos.codigo', 'LIKE', "%" . $search . "%")
                ->orWhere('produtos.nome', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return $this->model->join('produtos', 'codigo_grades.produtos_id', '=', 'produtos.id')
            ->join('cores as c', 'c.id', '=', 'codigo_grades.cores_id')
            ->join('tamanhos as t', 't.id', '=', 'codigo_grades.tamanhos_id')
            ->select(DB::raw('CONCAT(produtos.nome," ",c.cor," ",t.tamanho) AS descricao'), 'codigo_grades.codigo_grade AS codigo')->limit(15)->get();
    }
}
