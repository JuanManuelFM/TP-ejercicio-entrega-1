<?php
class Viajes{
    //atributos
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleccionPasajeros;
    private $responsableViaje;

    public function __construct($unCodigo, $unDestino, $pasajeros){
        $this->codigo=$unCodigo;
        $this->destino=$unDestino;
        $this->cantidadMaxPasajeros=$pasajeros;
        $this->coleccionPasajeros=[];
        //$this->$responsableViaje="";
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
    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }
    
    public function __toString(){
        $arrayPasajeros= $this->getColeccionPasajeros(); 
        $datosPasajeros="";
        for ($i = 0; $i < count($arrayPasajeros); $i++){
            $objPasajero=$arrayPasajeros[$i];
            $datosPasajeros= $datosPasajeros . "Nombre del pasajero " . $objPasajero->getNombre(). " de apellido " . $objPasajero->getApellido() . "\n" . "Telefono: " . $objPasajero->getTelefono() . "\n" . "Numero de Documento: " . $objPasajero->getDocumento() . "\n";
        }
        return ("Codigo de viaje " . $this->getCodigo(). " con destino a " . $this->getDestino() . "\n" . "Cantidad de pasajeros " . $this->getCantidadMaxPasajeros() . "\n" . $datosPasajeros);
    }
}

