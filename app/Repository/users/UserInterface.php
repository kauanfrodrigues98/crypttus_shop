<?php

namespace App\Repository\users;

use Illuminate\Database\Eloquent\Collection;

interface UserInterface
{
    public function findAll(): Collection;

    public function show(int $id);

    public function get(string $search);
}
