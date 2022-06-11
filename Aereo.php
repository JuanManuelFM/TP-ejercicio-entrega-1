<?php

class Aereo extends Viaje{
    //clase que representa viajes Aereos
    private $nroVuelo;
    private $aereolinea;
    private $escalas;
        //constructor Aereo
        public function __construct($unCodigo, $unDestino,$pasajeros, $pasajerosRegistrados, $objResViaje,$tipoDeAsiento, $importeViaje, $esIdaVuelta, $nroDeVuelo, $nombreAereolinea, $hayEscalas){
            //Invocamos constructor persona
            parent::__construct($unCodigo, $unDestino,$pasajeros, $pasajerosRegistrados, $objResViaje, $tipoDeAsiento, $importeViaje, $esIdaVuelta);
            //agregamos atributo nuevo
            $this->nroVuelo= $nroDeVuelo;
            $this->aereolinea= $nombreAereolinea;
            $this->escalas= $hayEscalas;
        }

    public function setNroVuelo($nroDeVuelo){
        $this->nroVuelo= $nroDeVuelo;
    }
    public function setAereolinea($nombreAereolinea){
        $this->aereolinea= $nombreAereolinea;
    }
    public function setEscalas($hayEscalas){
        $this->escalas= $hayEscalas;
    }

    public function getNroVuelo(){
        return $this->nroVuelo;
    }
    public function getAereolinea(){
        return $this->aereolinea;
    }
    public function getEscalas(){
        return $this->escalas;
    }

    public function venderPasaje($pasajero){
        //llamamos al parent:: porque vamos a usar un metodo de la clase padre pero lo redefiniremos
        $importe= parent:: venderPasaje($pasajero);
        //usamos el $this-> porque no estamos redifiniendo, solo llamamos un atributo de la clase padre
        $tipoAsiento= $this->getTipoAsiento();
            if ($tipoAsiento == "PRIMERA CLASE"){
                if ($this->getEscalas() == true){
                    //Al ser primera clase y con escalas incrementa un 60% (* 1.6)
                    $importe= $importe + (($importe*60)/100);
                    $this->setImporte($importe);
                }
                else{
                    $importe= $importe + (($importe*40)/100);
                }
            }
        return $importe;
    }

    public function __toString(){
        $cadenaAereo= parent::__toString();
        $cadenaAereo= "El número de vuelo es: " . $this->getNroVuelo() . " de clase " . $this->getTipoAsiento() . "\n" .
        "Este vuelo pertenece a la Aereolínea: " . $this->getAereolinea() . "\n"; 
    }
}