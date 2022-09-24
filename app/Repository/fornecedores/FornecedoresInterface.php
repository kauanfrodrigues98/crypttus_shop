<?php

namespace App\Repository\fornecedores;

interface FornecedoresInterface
{
    public function findAll();

    public function store(array $dados);

    public function update(int $id, array $dados);

    public function destroy(int $id);

    public function get(string $search);

    public function getDetalhes(string $id);
}
