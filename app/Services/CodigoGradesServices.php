<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\CodigoGrades;
use App\Models\Cores;
use App\Models\Estoques;
use App\Models\Produtos;
use App\Models\Tamanhos;
use App\Repository\codigo_grades\CodigoGradesRepository;
use App\Repository\estoques\EstoquesRepository;
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
                $dados['produtos_id'] = Produtos::select('id')->where('codigo', $request->produto[$index])->first()->id;
                $dados['cores_id'] = Cores::select('id')->where('codigo', $request->cor[$index])->first()->id;
                $dados['tamanhos_id'] = Tamanhos::select('id')->where('codigo', $request->tamanho[$index])->first()->id;
                $dados['codigo_grade'] = $grade;

                $repository = (new CodigoGradesRepository(new CodigoGrades()))->store($dados);

                if (!$repository) {
                    throw new CustomException('Não foi possivel cadastrar código grade.', 430);
                }

                $estoque['codigo_grade'] = $grade;
                $estoque['quantidade'] = 0;
                $estoque['quantidade_anterior'] = 0;

                $repository = (new EstoquesRepository(new Estoques))->store($estoque);

                if (!$repository) {
                    throw new CustomException('Não conseguimos alterar o estoque.', 430);
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

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new CodigoGradesRepository(new CodigoGrades))->get($search);
    }

    public static function getForVenda($request)
    {
        $search = $request->search ?? '';

        return (new CodigoGradesRepository(new CodigoGrades))->getForVenda($search);
    }
}
