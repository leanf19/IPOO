<?php


class Teatro
{
    private $nombre;
    private $direccion;
    private $funciones;

    public function __construct($nom,$dir)
    {
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->funciones = array();
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getFunciones()
    {
        return $this->funciones;
    }
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }
    public function setFunciones($indice, $nom, $precio)
    {
        if ($indice <= 3) {
            $this->funciones[$indice] = array('nombre' => $nom, 'precio' => $precio);
            $error = false;
        } else {
            $error = true;
        }
        return $error;
    }
    public function agregarFunciones($indice, $nom, $precio)
    {
        $this->funciones[$indice] = array('nombre' => $nom, 'precio' => $precio);
    }
    public function __toString()
    {
        return "(" . $this->getNombre().",".$this->getDireccion().",".print_r($this->getFunciones()).")";
    }
}