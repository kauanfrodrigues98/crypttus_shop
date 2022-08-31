<?php

namespace App\Helpers;

class FuncoesHelpers
{
    public static function dataHoraSQLparaBR(string $data)
    {
        return date('d/m/Y H:i:s', strtotime($data));
    }
}
