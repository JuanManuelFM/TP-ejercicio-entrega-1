<?php
class Viajes{
    //atributos
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleccionPasajeros;
    private $objResponsableV;
    private $asientos;
    private $importe;
    private $idaVuelta;

    public function __construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje){
        $this->codigo=$unCodigo;
        $this->destino=$unDestino;
        $this->cantidadMaxPasajeros=$pasajeros;
        $this->coleccionPasajeros=$pasajerosRegistrados;
        $this->objResponsableV=$objResViaje;
        $this->asientos=10;
        $this->importe=5000;
        //en mi caso hice que todos los asientos sean ida y vuelta
        $this->idaVuelta=true;
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
    public function setColeccionPasajeros($pasajerosRegistrados){
        $this->coleccionPasajeros=$pasajerosRegistrados;
    }
    public function setObjResponsableV($objResViaje){
        $this->objResponsableV=$objResViaje;
    }
    public function setAsientos(){
        $this->asientos=10;
    }
    public function setImporte(){
        $this->asientos=5000;
    }
    public function setIdaVuelta(){
        $this->asientos=true;
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
    public function getObjResponsableV(){
        return $this->objResponsableV;
    }
    public function getAsientos(){
        $this->asientos;
    }
    public function getImporte(){
        $this->asientos;
    }
    public function getIdaVuelta(){
        $this->asientos;
    }

    public function hayPasajesDisponible(){
        $cantPasajerosMaxima = $this->getCantidadMaxPasajeros();
        $cantAsientosDisponibles = $this->getAsientos();
        $lugar = false;
        if($cantAsientosDisponibles < $cantPasajerosMaxima){
           $lugar = true;
        }
        return $lugar;
    }

    public function buscarPasajero($dniPasajeroBuscar){
    $arregloPasajeros= $this->getColeccionPasajeros();
    $posicionCo1= -1;
    $i = 0;
    $encontrado= false;
         while ($i < count($arregloPasajeros) && !$encontrado){
             $unPasajero = $arregloPasajeros[$i];
             $encontrado = ($unPasajero->getDocumento() == $dniPasajeroBuscar);
             $i=$i+1;
         }
    $posicionCo1= ($encontrado?($i-1):-1);
    return $posicionCo1;
    }

    public function modificarPasajero($posColPasajeroI, $nombrePasajeroI, $apellidoPasajeroI, $telefonoPasajeroI){
    $arregloPasajeros= $this->getColeccionPasajeros();
    $objPasajeroMod = $arregloPasajeros[$posColPasajeroI];
    $objPasajeroMod->setNombre($nombrePasajeroI);
    $objPasajeroMod->setApellido($apellidoPasajeroI);
    $objPasajeroMod->setTelefono($telefonoPasajeroI);
    }

    /**
     * Este modulo agrega un nuevo pasajero al final del array de pasajeros existente.
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
        foreach($arrayPasajeros as $objPasajeros){
            $datosPasajeros=$datosPasajeros . "\n" . $objPasajeros . "\n";
        }
        return ("Codigo de viaje " . $this->getCodigo(). " con destino a " . $this->getDestino() . "\n" . "Cantidad de pasajeros " . $this->getCantidadMaxPasajeros() . "\n" . $datosPasajeros . "\n" . $this->getObjResponsableV() . "\n" . "Hay " . $this->getAsientos() . " disponibles actualmente cuyo importe inicial es de $" . $this->getImporte() . " sin tener en cuenta gastos extras" . "\n");
    }
}

