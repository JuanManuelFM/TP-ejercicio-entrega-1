<?php
class ResponsableV{
    //atributos
    private $numeroEmpleado;
    private $licencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado, $numlicencia, $nombreResponsable, $apellidoResponsable){
        $this->numeroEmpleado=$unCodigo;
        $this->numeroLicencia=$unDestino;
        $this->nombre=$nombreResponsable;
        $this->apellido=$apellidoResponsable;
    }
    public function setNumeroEmpleado($numEmpleado){
        $this->numeroEmpleado=$numEmpleado;
    }
    public function setNumeroLicencia($numLicencia){
        $this->numeroLicencia=$numLicencia;
    }
    public function setNombre($nombreResponsable){
        $this->nombre=$nombreResponsable;
    }
    public function setApellido($apellidoResponsable){
        $this->apellido=$apellidoResponsable;
    }
    
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
}