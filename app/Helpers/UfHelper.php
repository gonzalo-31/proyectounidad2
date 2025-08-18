<?php

namespace App\Helpers;

class UfHelper
{
    public static function getUf()
    {
        $json = @file_get_contents('https://mindicador.cl/api/uf');
        $data = json_decode($json, true);
        return $data['serie'][0]['valor'] ?? null;
    }
}
