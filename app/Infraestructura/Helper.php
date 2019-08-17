<?php

namespace App\Infraestructura;

use Carbon\Carbon;

class Helper
{

    public static function now($tz = null)
    {
        if (is_null($tz)) {
            $tz = 'America/Argentina/Buenos_Aires';
        }

        return Carbon::now($tz);
    }

    public static function formatoFecha($fecha, $formato = 'd/m/Y H:i:s')
    {
        return Carbon::parse($fecha)->format($formato);
    }

    public static function formatoFecha2($fecha, $formatoEntrada = 'd/m/Y H:i', $formatoSalida = 'Y-m-d H:i')
    {
        return Carbon::createFromFormat($formatoEntrada, $fecha)->format($formatoSalida);
    }

    public static function formatoFecha3($fecha, $formato = 'Y-m-d')
    {
        return Carbon::parse($fecha)->format($formato);
    }

    public static function formatoFechaDesde($fecha, $formatoEntrada = 'd/m/Y H:i:s', $formatoSalida = 'Y-m-d H:i:s')
    {
        return Carbon::createFromFormat($formatoEntrada, $fecha)->startOfDay()->format($formatoSalida);
    }

    public static function formatoFechaHasta($fecha, $formatoEntrada = 'd/m/Y H:i:s', $formatoSalida = 'Y-m-d H:i:s')
    {
        return Carbon::createFromFormat($formatoEntrada, $fecha)->endOfDay()->format($formatoSalida);
    }

    public static function createFromFormat($horario, $formato)
    {
        return Carbon::createFromFormat($formato, $horario);
    }

    public static function strtolower($value)
    {
        if (is_null($value)) {
            return $value;
        }

        return mb_strtolower($value);
    }

    public static function ucwords($value)
    {
        if (is_null($value)) {
            return $value;
        }

        return ucwords(mb_strtolower($value));
    }

    public static function ucfirst($value)
    {
        if (is_null($value)) {
            return $value;
        }

        return ucfirst(mb_strtolower($value));
    }

}
