<?php
include 'Viajes.php';

class Terrestre extends Viajes{
    //clase que representa viajes terrestres
    private $comodidadAsiento;
    public function __construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje, $cantAsientos, $comodidadDeAsiento){
            //constructor Terrestre
        parent::__construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje, $cantAsientos);
            //agregamos atributo nuevo
        $this->$comodidadAsiento= $comodidadDeAsiento;
    }

    public function setComodidadAsiento($comodidadDeAsiento){
        $this->comodidadAsiento= $comodidadDeAsiento;
    }

    public function getComodidadAsiento(){
        return $this->comodidadAsiento;
    }

    public function ImporteViajeTerrestre(){
        $importe= $this->getImporte();
        $importeTotal= $this->getImporte();
        $tipoAsiento= $this->getComodidadAsiento();
        if ($tipoAsiento == "CAMA"){
            $importeTotal= $importe + (($importe*25)/100);
            $this->setImporte($importeTotal);
        }
        if ($idaVuelta == true){
            $importeTotal= $importe + (($importe*50)/100);
            $this->setImporte($importeTotal);
        }
        return $importeTotal;
    }

    public function venderPasaje($pasajero){
        if ($this->hayPasajesDisponibles() == true){
            $importe= $this->getImporte();
            $importeTotal= $this->getImporte();
            $tipoAsiento= $this->getComodidadAsiento();
            if ($tipoAsiento == "CAMA"){
                $importeTotal= $importe + (($importe*25)/100);
                $this->setImporte($importeTotal);
            }
            if ($idaVuelta == true){
                $importeTotal= $importe + (($importe*50)/100);
                $this->setImporte($importeTotal);
            }
            $asientosActualizado= $this->getAsientos();
            $asientosActualizado= $asientosActualizado - 1;
            $this->setAsientos($asientosActualizado);
        }
        return $importeTotal;
    }

    public function __toString(){
        $cadenaTerrestre= parent::__toString();
        $cadenaTerrestre= "El tipo de asiento de vuelo terrestre es: " . $this->getComodidadAsiento() . " por lo que el nuevo monto será de $" . $this->getImporte() . "\n"; 
    }


}