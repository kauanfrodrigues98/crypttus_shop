<?php

namespace App\Repository\codigo_grades;

interface CodigoGradesInterface
{
    public function get(string $search);

    public function getForVenda(string $search);
}
