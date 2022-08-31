<?php

namespace App\Repository\users;

use Illuminate\Database\Eloquent\Collection;

interface UserInterface
{
    public function findAll(): Collection;

    public function store(array $dados);

    public function update(int $id, array $dados);

    public function destroy(int $id);

    public function findOne(int $id);
}
