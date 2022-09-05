<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\CodigoGrades;
use App\Models\Cores;
use App\Models\Produtos;
use App\Models\Tamanhos;
use App\Repository\codigo_grades\CodigoGradesRepository;
use Illuminate\Support\Facades\DB;

class CodigoGradesServices
{
    public static function findAll()
    {
        try {
            return (new CodigoGradesRepository(new CodigoGrades))->findAll();
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        DB::beginTransaction();
        try {
            $index = 0;
            foreach ($request->codigo_grade as $grade) {
                $dados['produtos_id'] = (Produtos::select('id')->where('codigo', $request->produto[$index])->first())->id;
                $dados['cores_id'] = (Cores::select('id')->where('codigo', $request->cor[$index])->first())->id;
                $dados['tamanhos_id'] = (Tamanhos::select('id')->where('codigo', $request->tamanho[$index])->first())->id;
                $dados['codigo_grade'] = $grade;

                $repository = (new CodigoGradesRepository(new CodigoGrades()))->store($dados);

                if (!$repository) {
                    throw new CustomException('Não foi possivel cadastrar código grade.', 430);
                }

                $index++;
            }

            DB::commit();
            return Response('Código grade gerado com sucesso.', 200);
        } catch (CustomException $e) {
            DB::rollBack();
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            DB::rollBack();
            return Response($e->getMessage(), 430);
        }
    }
}
