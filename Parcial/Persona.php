<?php


class Persona
{
private $nombre;
private $apellido;
private $dni;
private $direccion;
private $email;
private $telefono;
private $neto;

    /**
     * Metodo Constructor de clase Persona
     * @param $nombre
     * @param $apellido
     * @param $dni
     * @param $direccion
     * @param $email
     * @param $telefono
     * @param $neto
     */
    public function __construct($nom, $ape, $nroDni, $dir, $mail, $tel, $net)
    {
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->dni = $nroDni;
        $this->direccion = $dir;
        $this->email = $mail;
        $this->telefono = $tel;
        $this->neto = $net;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nom): void
    {
        $this->nombre = $nom;
    }


    public function getApellido()
    {
        return $this->apellido;
    }


    public function setApellido($ape): void
    {
        $this->apellido = $ape;
    }


    public function getDni()
    {
        return $this->dni;
    }


    public function setDni($dni): void
    {
        $this->dni = $dni;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($dir): void
    {
        $this->direccion = $dir;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($mail): void
    {
        $this->email = $mail;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function setTelefono($tel): void
    {
        $this->telefono = $tel;
    }


    public function getNeto()
    {
        return $this->neto;
    }

    public function setNeto($net): void
    {
        $this->neto = $net;
    }

    public function __toString(): string
    {
        $salida = "\nNombre teatro: {$this->getNombre()}
        \n Apellido: {$this->getApellido()}
        \n Dni: {$this->getDni()}
        \nDireccion: {$this->getDireccion()}
        \nEmail: {$this->getEmail()}
        \nTelefono: {$this->getTelefono()}
        \nNeto: {$this->getNeto()}\n";

        return $salida;
    }


}