<?php
include 'Viajes.php';

class Aereos extends Viajes{
    //clase que representa viajes terrestres
    private $nroVuelo;
    private $categoriaAsiento;
    private $aereolinea;
    private $escalas;
    public function __construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje, $cantAsientos, $comodidadDeAsiento){
            //constructor Terrestre
        parent::__construct($unCodigo, $unDestino, $pasajeros, $pasajerosRegistrados, $objResViaje, $cantAsientos, $nroDeVuelo, $categoriaDeAsiento, $nombreAereolinea);
            //agregamos atributo nuevo
        $this->$nroVuelo= $nroDeVuelo;
        $this->$categoriaAsiento= $categoriaDeAsiento;
        $this->$aereolinea= $nombreAereolinea;
        //hago que los viajes aereos siempre tnegan escalas
        $this->$escalas= true;
    }

    public function setNroVuelo($nroDeVuelo){
        $this->nroVuelo= $nroDeVuelo;
    }
    public function setCategoriaAsiento($categoriaDeAsiento){
        $this->categoriaAsiento= $categoriaDeAsiento;
    }
    public function setAereolinea($nombreAereolinea){
        $this->aereolinea= $nombreAereolinea;
    }
    public function setEscalas(){
        $this->escalas= true;
    }

    public function getNroVuelo(){
        return $this->nroVuelo;
    }
    public function getCategoriaAsiento(){
        return $this->categoriaAsiento;
    }
    public function getAereolinea(){
        return $this->aereolinea;
    }
    public function getEscalas(){
        return $this->escalas;
    }

    public function ImporteViajeAereo(){
        $importe= $this->getImporte();
        $importeTotal= $this->getImporte();
        $categoria= $this->getCategoriaAsiento();
        $hayEscalas= $this->getEscalas();
        if ($hayEscalas == true){
            $importeTotal= $importe + (($importe*20)/100);
            $this->setImporte($importeTotal);
        }
        if ($categoria == "Primera Clase"){
            $importeTotal= $importe + (($importe*40)/100);
            $this->setImporte($importeTotal);
        }
        if ($idaVuelta == true){
            $importeTotal= $importe + (($importe*50)/100);
            $this->setImporte($importeTotal);
        }
        return $importeTotal;
    }

    public function __toString(){
        $cadenaAereo= parent::__toString();
        $cadenaAereo= "El número de vuelo es: " . $this->getNroVuelo() . " de clase " . $this->getCategoriaAsiento() . "\n" . "Este vuelo pertenece a la Aereolínea: " . $this->getAereolinea() . "\n"; 
    }
}