<?php


class Cuota
{
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada;

    /**
     * metodo constructor de la clase Cuota
     * @param $numero
     * @param $monto_cuota
     * @param $monto_interes
     * @param $cancelada
     */
    public function __construct($nro, $cuota, $interes)
    {
        $this->numero = $nro;
        $this->monto_cuota = $cuota;
        $this->monto_interes = $interes;
        $this->cancelada = false;

    }


    public function getNumero()
    {
        return $this->numero;
    }


    public function setNumero($nro): void
    {
        $this->numero = $nro;
    }


    public function getMontoCuota()
    {
        return $this->monto_cuota;
    }


    public function setMontoCuota($cuota): void
    {
        $this->monto_cuota = $cuota;
    }


    public function getMontoInteres()
    {
        return $this->monto_interes;
    }


    public function setMontoInteres($interes): void
    {
        $this->monto_interes = $interes;
    }


    public function getCancelada(): bool
    {
        return $this->cancelada;
    }


    public function setCancelada(bool $pago): void
    {
        $this->cancelada = $pago;
    }

    public function __toString(): string
    {
        $salida = "\nNumero de cuota: {$this->getNumero()}
        \n Monto de la Cuota: {$this->getMontoCuota()}
        \n Monto del interes: {$this->getMontoInteres()}
        \nCuota Cancelada: {$this->getCancelada()}\n";

        return $salida;
    }

    public function darMontoFinalCuota(): float
    {
       return $montoTotal = $this->getMontoCuota()+ $this->getMontoInteres();
    }


}