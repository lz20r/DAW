<?php

// Archivo: Cuenta.php
class Cuenta
{
    private $totalCuenta;

    public function __construct($saldoInicial = 0)
    {
        $this->totalCuenta = $saldoInicial;
    }

    public function depositar($monto)
    {
        if ($monto > 0) {
            $this->totalCuenta += $monto;
        } else {
            echo "El monto a depositar debe ser mayor que 0.<br>";
        }
    }

    public function retirar($monto)
    {
        if ($monto > $this->totalCuenta) {
            echo "Fondos insuficientes.<br>";
            exit();
        } elseif ($monto > 0) {
            $this->totalCuenta -= $monto;
        } else {
            echo "El monto a retirar debe ser mayor que 0.<br>";
        }
    }

    public function getBalanceCuenta()
    {
        $fechaActual = date("Y-m-d H:i:s");
        return "{$fechaActual}: " .  "<span style='color: red;'>{$this->totalCuenta}€</span>";
    }
}

// Archivo principal
require_once 'Cuenta.php';

// Crear una instancia de la clase Cuenta
$miCuenta = new Cuenta();

// Realizar las operaciones indicadas
$miCuenta->depositar(2000);
echo $miCuenta->getBalanceCuenta() . "<br>";

$miCuenta->retirar(1500);
echo $miCuenta->getBalanceCuenta() . "<br>";

$miCuenta->retirar(100);
echo $miCuenta->getBalanceCuenta() . "<br>";

$miCuenta->retirar(500); // Esta operación detendrá el script si no hay fondos suficientes
