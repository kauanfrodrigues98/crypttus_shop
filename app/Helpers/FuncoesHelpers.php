<?php

namespace App\Helpers;

class FuncoesHelpers
{
    const ESTADOS_BRASILEIROS = [
        'AC'=>'Acre',
        'AL'=>'Alagoas',
        'AP'=>'Amapá',
        'AM'=>'Amazonas',
        'BA'=>'Bahia',
        'CE'=>'Ceará',
        'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',
        'GO'=>'Goiás',
        'MA'=>'Maranhão',
        'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',
        'MG'=>'Minas Gerais',
        'PA'=>'Pará',
        'PB'=>'Paraíba',
        'PR'=>'Paraná',
        'PE'=>'Pernambuco',
        'PI'=>'Piauí',
        'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte',
        'RS'=>'Rio Grande do Sul',
        'RO'=>'Rondônia',
        'RR'=>'Roraima',
        'SC'=>'Santa Catarina',
        'SP'=>'São Paulo',
        'SE'=>'Sergipe',
        'TO'=>'Tocantins'
    ];

    public static function dataHoraSQLparaBR(string $data): string
    {
        return date('d/m/Y H:i:s', strtotime($data));
    }

    public static function dataBRparaSQL(string $data): string
    {
        return date('Y-m-d', strtotime($data));
    }

    public static function dataSQLparaBR(string $data): string
    {
        return date('d/m/Y', strtotime($data));
    }
}
