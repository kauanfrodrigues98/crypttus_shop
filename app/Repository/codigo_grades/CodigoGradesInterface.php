<?php

namespace App\Repository\codigo_grades;

interface CodigoGradesInterface
{
    public function findAll();

    public function store(array $dados);

    public function update(int $id, array $dados);

    public function destroy(int $id);
}
