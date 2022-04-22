<?php
class Viajes{
    //atributos
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleccionPasajeros;
    private $responsableViaje;

    public function __construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $responsableV){
        $this->codigo=$unCodigo;
        $this->destino=$unDestino;
        $this->cantidadMaxPasajeros=$pasajeros;
        $this->responsableViaje=$responsableV;
        $this->coleccionPasajeros=$pasajerosRegistrados;
        //$this->$responsableViaje="";
    }
    public function setCodigo($unCodigo){
        $this->codigo=$unCodigo;
    }
    public function setDestino($unDestino){
        $this->destino=$unDestino;
    }
    public function setCantidadMaxPasajeros($pasajeros){
        $this->cantidadMaxPasajeros=$pasajeros;
    }
    public function setResponsableViaje($responsableV){
        $this->responsableViaje=$responsableV;
    }
    public function setColeccionPasajeros($pasajerosRegistrados){
        $this->coleccionPasajeros=$pasajerosRegistrados;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantidadMaxPasajeros(){
        return $this->cantidadMaxPasajeros;
    }
    public function getResponsableViaje(){
        $this->responsableViaje;
    }
    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }
    
        /**
     * Este modulo agrega un nuevo pasajero al final del array pasajero existente.
     * @param object $nuevoObjPasajero
    */
    public function agregarPasajeros($nuevoObjPasajero){
        $arrayPasajeros = $this->getColeccionPasajeros();
        array_push($arrayPasajeros, $nuevoObjPasajero);
        $this->setColeccionPasajeros($arrayPasajeros);
    }

    public function __toString(){
        $arrayPasajeros= $this->getColeccionPasajeros(); 
        $datosPasajeros="";
        foreach($arrayPasajeros as $pasajero){
            $datosPasajeros=$datosPasajeros . "\n" . $pasajero . "\n";
        }
        return ("Codigo de viaje " . $this->getCodigo(). " con destino a " . $this->getDestino() . "\n" . "Cantidad de pasajeros " . $this->getCantidadMaxPasajeros() . "\n" . $datosPasajeros);
    }
}

