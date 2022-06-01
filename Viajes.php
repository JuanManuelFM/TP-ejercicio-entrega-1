<?php
class Viajes{
    //atributos
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleccionPasajeros;
    private $objResponsableV;
    private $tipoAsiento;
    private $importe;
    private $idaVuelta;

    public function __construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje, $tipoDeAsiento, $importeViaje, $esIdaVuelta){
        $this->codigo=$unCodigo;
        $this->destino=$unDestino;
        $this->cantidadMaxPasajeros=$pasajeros;
        $this->coleccionPasajeros=$pasajerosRegistrados;
        $this->objResponsableV=$objResViaje;
        $this->tipoAsiento=$tipoDeAsiento;
        $this->importe=$importeViaje;
        //en mi caso hice que todos los asientos sean ida y vuelta
        $this->idaVuelta=$esIdaVuelta;
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
    public function setAsientos($tipoDeAsiento){
        $this->tipoAsiento=$tipoDeAsiento;
    }
    public function setImporte(){
        $this->importe=$importeViaje;
    }
    public function setIdaVuelta(){
        $this->idaVuelta=$esIdaVuelta;
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
    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function getIdaVuelta(){
        return $this->idaVuelta;
    }

    public function hayPasajesDisponible(){
        $lugar = false;
        if(count($this->getCollecionPasajeros) < $this->getCantidadMaxPasajeros()){
           $lugar = true;
        }
        return $lugar;
    }

    public function venderPasaje($objPasajeros){
        $importe= 5000;
        if($this->$hayPasajesDisponibles()){
            $this->agregarPasajero($objPasajeros);
            $importe= $this->getImporte();
            //como ambos tipos de viaje aumentan el pasaje según si son ida y vuelta puedo poner el incremento en la función padre
            if($this->getIdaVuelta()){
                //50% más al ser ida y vuelta, también se puede escribir * 1.50
                $importe= $importe + (($importe*50)/100);
                $this->setImporte($importe);
            }
        }
        return $importe;
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
            $datosPasajeros=$datosPasajeros . "\n" . $objPasajeros;
        }
        return ("Codigo de viaje " . $this->getCodigo(). " con destino a " . $this->getDestino() . "\n" . "Cantidad de pasajeros " . $this->getCantidadMaxPasajeros() . "\n" . $datosPasajeros . "\n" . $this->getObjResponsableV() . "\n");
    }
}

