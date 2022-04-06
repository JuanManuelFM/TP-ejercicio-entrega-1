<?php

//holahola

class Viajes{
    //atributos
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleccionPasajeros;

    public function __construct($unCodigo, $unDestino, $pasajeros){
        $this->codigo=$unCodigo;
        $this->destino=$unDestino;
        $this->cantidadMaxPasajeros=$pasajeros;
        $this->coleccionPasajeros=[];
    }
    public function setCodigo($unCodigo){
        $this->codigo=$unCodigo;
    }
    public function setDestino($unDestino){
        $this->destino=$unDestino;
    }
    public function setCantidadMaxPasajeros($unCanPasajeros){
        $this->cantidadMaxPasajeros=$unCanPasajeros;
    }
    /** 
    * @param array $unArray
    */
    public function setColeccionPasajeros($pasajerosArray){
        $this->coleccionPasajeros=$pasajerosArray;
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
    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }
    public function nuevoPasajero(){
        $auxPasajeros=$this->getColeccionPasajeros();
        $nuevaPosicion=count($auxPasajeros);

        if ($nuevaPosicion < $this->getCantidadMaxPasajeros()){
        echo "Ingrese el nombre del pasajero: ";
        $nombre=trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero: ";
        $apellido=trim(fgets(STDIN));
        echo "Ingrese el documento del pasajero: ";
        $documento=trim(fgets(STDIN));
        $nuevoPasajero=["nombre"=>$nombre, "apellido"=>$apellido, "documento"=>$documento];
        $auxPasajeros[$nuevaPosicion]=$nuevoPasajero;
        $this->setColeccionPasajeros($auxPasajeros);
        }
        else
        echo "No hay más lugar";
    }
    public function __toString(){
        return ("Codigo de viaje " . $this->getCodigo(). " destino " . $this->getDestino() . " cantidad de pasajeros " . $this->getCantidadMaxPasajeros());

    }
}

