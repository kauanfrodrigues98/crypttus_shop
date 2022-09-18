<?php

namespace App\Repository\vendas;

interface VendasInterface
{
    public function findAll(array $dados);

    public function store(array $dados);

    public function update(int $id, array $dados);

    public function destroy(int $id);
}