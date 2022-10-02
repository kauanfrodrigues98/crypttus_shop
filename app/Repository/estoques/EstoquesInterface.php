<?php

namespace App\Repository\estoques;

interface EstoquesInterface
{
    public function updateEstoque(array $dados);

    public function temEstoque(int $quantidade, string $codigo);
}
