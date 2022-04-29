<?php
class ResponsableV{
    //atributos
    private $nombre;
    private $apellido;
    private $numeroEmpleado;
    private $licencia;
    
    public function __construct($nombreResponsable, $apellidoResponsable, $numEmpleado, $numlicencia){
        $this->nombre=$nombreResponsable;
        $this->apellido=$apellidoResponsable;
        $this->numeroEmpleado=$numEmpleado;
        $this->numeroLicencia=$numlicencia;
        
    }

    public function setNombre($nombreResponsable){
        $this->nombre=$nombreResponsable;
    }
    public function setApellido($apellidoResponsable){
        $this->apellido=$apellidoResponsable;
    }
    public function setNumeroEmpleado($numEmpleado){
        $this->numeroEmpleado=$numEmpleado;
    }
    public function setNumeroLicencia($numLicencia){
        $this->numeroLicencia=$numLicencia;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }
    

    public function __toString(){
        return ("El encargado del viaje fue: " . $this->getNombre() . " de apellido " . $this->getApellido() . "\n" . "N° de empleado: " . $this->getNumeroEmpleado(). " de licencia " . $this->getNumeroLicencia() . "\n");
    }
    


}