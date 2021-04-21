<?php
include "Persona.php";
include "Cuota.php";


class Prestamo
{
private $id;
private $codigoElectro;
private $fechaOtorgamiento;
private $monto;
private $cantCuotas;
private $tazaInteres;
private $cuotas;
private $cliente;

    /**
     * Metodo constructor de la clase Prestamo
     * @param $id
     * @param $codigoElectro
     * @param $fechaOtorgamiento
     * @param $monto
     * @param $cantCuotas
     * @param $tazaInteres
     * @param $cuotas
     * @param $cliente
     */
    public function __construct($ide, $codigo, $fecha, $valor, $cant, $taza, $persona)
    {
        $this->id = $ide;
        $this->codigoElectro = $codigo;
        $this->fechaOtorgamiento = $fecha;
        $this->monto = $valor;
        $this->cantCuotas = $cant;
        $this->tazaInteres = $taza;
        $this->cuotas = Array();
        $this->cliente = $persona;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($ide): void
    {
        $this->id = $ide;
    }


    public function getCodigoElectro()
    {
        return $this->codigoElectro;
    }


    public function setCodigoElectro($codigo): void
    {
        $this->codigoElectro = $codigo;
    }


    public function getFechaOtorgamiento()
    {
        return $this->fechaOtorgamiento;
    }


    public function setFechaOtorgamiento($fecha): void
    {
        $this->fechaOtorgamiento = $fecha;
    }


    public function getMonto()
    {
        return $this->monto;
    }


    public function setMonto($valor): void
    {
        $this->monto = $valor;
    }


    public function getCantCuotas()
    {
        return $this->cantCuotas;
    }


    public function setCantCuotas($cant): void
    {
        $this->cantCuotas = $cant;
    }


    public function getTazaInteres()
    {
        return $this->tazaInteres;
    }


    public function setTazaInteres($taza): void
    {
        $this->tazaInteres = $taza;
    }


    public function getCuotas(): array
    {
        return $this->cuotas;
    }


    public function setCuotas(array $cuota): void
    {
        $this->cuotas = $cuota;
    }


    public function getCliente()
    {
        return $this->cliente;
    }


    public function setCliente($persona): void
    {
        $this->cliente = $persona;
    }

    public function mostrarCuotas()
    {
        $salida = "\n";
        foreach ($this->getCuotas() as $cuotas) {
            $salida .= "{$cuotas->__toString()}\n";
        }
        return $salida;
    }

    public function mostrarCliente()
    {
        return "{$this->getCliente()->__toString()}";
    }



    public function __toString(): string
    {
        $salida = "\nId: {$this->getId()}
        \n Codigo de Electrodomestico: {$this->getCodigoElectro()}
        \n Fecha de otorgamiento: {$this->getFechaOtorgamiento()}
        \nCantidad de Cuotas: {$this->getCantCuotas()}
        \nTaza de interes: {$this->getTazaInteres()}
        \nCuotas: {$this->mostrarCuotas()}
        \nNeto: {$this->mostrarCliente()}\n";

        return $salida;
    }

    private function calcularInteresPrestamo($numCuota): float
    {
       return $interes = (($this->getMonto() - (($this->getMonto()/$this->getCantCuotas())*($numCuota-1)))*($this->getTazaInteres()/100));

    }

    public function otorgarPrestamo()
    {
        $cuotasTemp = array();
        $this->setFechaOtorgamiento(getdate());
        for ($i = 1; $i <= $this->getCantCuotas(); $i++) {
            $cuotasTemp[] = new Cuota($i, ($this->getMonto() / $this->getCantCuotas()), $this->calcularInteresPrestamo($i));
        }
        $this->setCuotas($cuotasTemp);
    }

    public function darSiguienteCuotaPagar()
    {
        $cuotaImpaga = null;
        foreach ($this->getCuotas() as $cuota) {
            if (!$cuota->getCancelada()) {
                $cuotaImpaga = $cuota;
                break;
                //si se encuentra una cuota impaga(con atributo "cancelada" seteado en false devuelve la referencia a la misma
            }
        }
        return $cuotaImpaga;
    }

}