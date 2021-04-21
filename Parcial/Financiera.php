<?php
include "Prestamo.php";


class Financiera
{
 private $denominacion;
 private $direccion;
 private $prestamosOtorgados;

    /**
     * Metodo constructor de la clase Financiera
     * @param $denominacion
     * @param $direccion
     * @param $prestamosOtorgados
     */
    public function __construct($denom, $dir)
    {
        $this->denominacion = $denom;
        $this->direccion = $dir;
        $this->prestamosOtorgados = array();
    }


    public function getDenominacion()
    {
        return $this->denominacion;
    }


    public function setDenominacion($denom): void
    {
        $this->denominacion = $denom;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($dir): void
    {
        $this->direccion = $dir;
    }


    public function getPrestamosOtorgados(): array
    {
        return $this->prestamosOtorgados;
    }


    public function setPrestamosOtorgados(array $prestamos): void
    {
        $this->prestamosOtorgados = $prestamos;
    }

    public function mostrarPrestamos() : string
    {
        $salida = "\n";
        foreach ($this->getPrestamosOtorgados() as $prestamos) {
            $salida .= "{$prestamos->__toString()}\n";
        }
        return $salida;
    }

    public function __toString(): string
    {
        $salida = "\nDenominacion: {$this->getDenominacion()}
        \n Direccion: {$this->getDireccion()}
        \n Prestamos Otorgados: {$this->mostrarPrestamos()}\n";

        return $salida;
    }

    public function incorporarPrestamo($prestamo) : void
    {
       $this->prestamosOtorgados[] = $prestamo;

    }

    public function otorgarPrestamoSiCalifica() : void
    {
        foreach ($this->getPrestamosOtorgados() as $prestamos)
        {
            //si la fecha de otorgamiento esta vacia se evalua el prestamo
            if ($prestamos->getFechaOtorgamiento() == "")
            {
                $montoCuotas = $prestamos->getMonto() / $prestamos->getCantCuotas();
                $netoSolicitante = (($prestamos->getCliente()->getNeto()*40)/100);
                //si el monto de las cuotas es menor al 40% del neto del cliente se otorga el prestamo
                if ($montoCuotas < $netoSolicitante)
                {
                    $prestamos->otorgarPrestamo();
                }
            }
        }
    }

    public function informarCuotaPagar($idPrestamo)
    {
        $cuotaPagar= null;
        foreach($this->getPrestamosOtorgados() as $prestamos)
        {
            if($prestamos->getId() == $idPrestamo)
            {
            $cuotaPagar = $prestamos->darSiguienteCuotaPagar();
            break;
            //si se encuentra el prestamo con la Id obtenida por parametro se almacena en CuotaPaga y se devuelve sino vuelve null
            }
        }
        return $cuotaPagar;
    }

}