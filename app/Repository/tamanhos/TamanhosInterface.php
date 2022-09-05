<?php

namespace App\Repository\tamanhos;

interface TamanhosInterface
{
    public function findAll();

    public function store(array $dados);

    public function update(int $id, array $dados);

    public function destroy(int $id);

    public function get(string $search);
}
