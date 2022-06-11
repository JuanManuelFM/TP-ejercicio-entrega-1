<?php

class Terrestre extends Viaje{
    //clase que representa viajes terrestres
    public function __construct($unCodigo, $unDestino,$pasajeros, $pasajerosRegistrados, $objResViaje,$tipoDeAsiento, $importeViaje, $esIdaVuelta){
        //constructor Viajes
        parent::__construct($unCodigo, $unDestino,$pasajeros, $pasajerosRegistrados, $objResViaje,$tipoDeAsiento, $importeViaje, $esIdaVuelta);}

    public function ImporteViajeTerrestre(){
        $importe= $this->getImporte();
        $importeTotal= $this->getImporte();
        $tipoAsiento= $this->getTipoAsiento();
        if ($tipoAsiento == "CAMA"){
            $importeTotal= $importe + (($importe*25)/100);
            $this->setImporte($importeTotal);
        }
        if ($this->getIdaVuelta() == true){
            $importeTotal= $importe + (($importe*50)/100);
            $this->setImporte($importeTotal);
        }
        return $importeTotal;
    }

    public function venderPasaje($pasajero){
            $importe= parent:: venderPasaje($pasajero);
            $tipoAsiento= $this->getTipoAsiento();
            if ($tipoAsiento == "CAMA"){
                //25% más al ser cama, también se escribe * 1.25
                $importe= $importe + (($importe*25)/100);
                $this->setImporte($importe);
            }
        return $importe;
    }

    public function __toString(){
        $cadenaTerrestre= parent::__toString();
        $cadenaTerrestre= "El tipo de asiento de vuelo terrestre es: " . $this->getTipoAsiento() . " por lo que el nuevo monto será de $" . $this->getImporte() . "\n"; 
    }


}