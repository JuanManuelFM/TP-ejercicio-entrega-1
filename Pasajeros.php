<?php
class Pasajeros{
    //atributos
    private $nombre;
    private $apellido;
    private $telefono;
    private $documento;

    public function __construct($nombrePasajero, $apellidoPasajero, $telefonoPasajero, $numeroDocumento){
        $this->nombre=$nombrePasajero;
        $this->apellido=$apellidoPasajero;
        $this->telefono=$telefonoPasajero;
        $this->documento=$numeroDocumento;
    }
    public function setNombre($nombrePasajero){
        $this->nombre=$nombrePasajero;
    }
    public function setApellido($apellidoPasajero){
        $this->apellido=$apellidoPasajero;
    }
    public function setTelefono($telefonoPasajero){
        $this->telefono=$telefonoPasajero;
    }
    public function setDocumento($numeroDocumento){
        $this->documento=$numeroDocumento;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getDocumento(){
        return $this->documento;
    }

    public function __toString(){
        $strPasajeros="Nombre del pasajero " . $this->getNombre(). " de apellido " . $this->getApellido() . "\n" . "Telefono: " . $this->getTelefono() . "\n" . "Numero de Documento: " . $this->getDocumento() . "\n";
        return $strPasajeros;

    }

}