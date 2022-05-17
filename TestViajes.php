<?php
include 'Viajes.php';
include 'Pasajeros.php';
include 'ResponsableV.php';

/**
 * La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: Terrestres o Aéreos,   guardar su importe e indicar si el viaje es de ida y vuelta. De los viajes aéreos se conoce el número del vuelo, la categoría del asiento (primera clase o no), nombre de la aerolínea, y la cantidad de escalas del vuelo en caso de tenerlas. De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama.

 La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar la función venderPasaje (pasajero) que registra la venta de un viaje al pasajero que es recibido por parámetro. La venta se realiza  solo si hayPasajesDisponible. Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%.  Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, si el viaje además de ser  un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%. Tanto para  viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. El método  retorna el importe del pasaje si se pudo realizar la venta.

 Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es  menor a la cantidad máxima de pasajeros y falso caso contrario.
 */

/**
 * Solicita al usuario un número en el rango [$min,$max]
 * @param int $min
 * @param int $max
 * @return int 
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/**
 * Función que muestra las opciones del menú en la pantalla
 * @return int
 */

function seleccionarOpcion() {
    $minimo = 1;
    $maximo = 7;
        echo"1) :-----------Crear nuevo viaje-----------: \n";
        echo"2) :------Modificar datos de un viaje------: \n";
        echo"3) :---Agregar responsable a viaje creado--: \n";
        echo"4) :-Agregar pasajero a viaje ya existente-: \n";
        echo"5) :-----Modificar datos de un pasajero----: \n";
        echo"6) :-----Ver datos de viajes realizados----: \n";
        echo"7) :--------Realizar venta de pasaje-------: \n";
        $opcion = solicitarNumeroEntre($minimo, $maximo);
        // Function solicitarNumeroEntre($min, $max), reusada el archivo tateti.php
    return $opcion;
}

//Inicialización de variables
$viajesRealizados=[];
$pasajerosRegistrados=[];
//Datos pasajeros predefinidos para chequear funcionalidad de opciones del menú
//public function __construct($numEmpleado, $numlicencia, $nombreResponsable, $apellidoResponsable)
$objResViaje= new ResponsableV("GUILLERMO", "PEROJO", "1234", "45678");
$p1= new Pasajeros("JUAN", "MARTIN", "345", "43948491");
$p2= new Pasajeros("DAVID", "MARTINEZ", "456", "43948490");
$pasajerosRegistrados[0]=$p1;
$pasajerosRegistrados[1]=$p2;

$viajeEjemplo= new Viajes("456", "MADRID", 10, $pasajerosRegistrados, $objResViaje);
$viajeEjemplo->setColeccionPasajeros($pasajerosRegistrados);
$viajesRealizados[0]=$viajeEjemplo;

//Proceso de ejecutamiento del menú
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
                echo "****************************************** \n";
                echo ">--Ingrese numero de codigo del viaje: ";
                $unCodigo=strtoupper(trim(fgets(STDIN)));
                echo ">--Ingrese el destino: ";
                $unDestino=strtoupper(trim(fgets(STDIN)));
                echo ">--Ingrese cantidad de pasajeros: ";
                $pasajeros=trim(fgets(STDIN));
                echo "****************************************** \n";
                $viaje= new Viajes($unCodigo, $unDestino, $pasajeros);
                
                for($j = 0; $j < $pasajeros; $j++){
                    if ($j <= $pasajeros){
                        echo "^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ \n";
                        echo "ingrese nombre de nuevo pasajero: ";
                        $nombrePasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese apellido de pasajero: ";
                        $apellidoPasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese telefono de pasajero: ";
                        $telefonoPasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese documento de pasajero: ";
                        $numeroDocumento=strtoupper(trim(fgets(STDIN)));
                        echo "^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ \n";
                        $pasajero= new Pasajeros($nombrePasajero, $apellidoPasajero, $telefonoPasajero, $numeroDocumento);
                        $pasajerosRegistrados[$j]=$pasajero;
                    }
                }
                $viaje->setColeccionPasajeros($pasajerosRegistrados);
                $nuevaPosicionViaje=count($viajesRealizados);
                $viajesRealizados[$nuevaPosicionViaje]=$viaje;
        break;
        case 2: 
            $buscar= true;
            $i=0;
            $viajes1=$viajesRealizados;
            echo "****************************************** \n";
            echo "Ingrese el codigo del viaje cuyo destino y/o cantidad de pasajeros quiera modificar: ";
            $codigoViaje1=strtoupper(trim(fgets(STDIN)));
            while($i < count($viajesRealizados) && $buscar){
                $codigoEncontrar=$viajesRealizados[$i]->getCodigo();
                if($codigoEncontrar == $codigoViaje1){
                    $buscar= false;
                    echo "Ingrese nuevamente el destino del viaje: ";
                    $destinoViaje1=strtoupper(trim(fgets(STDIN)));
                    $viajesRealizados[$i]->setDestino($destinoViaje1);
                    echo "Ingrese nuevamente el número de pasajeros del viaje: ";
                    $pasajerosViaje1=strtoupper(trim(fgets(STDIN)));
                    $viajesRealizados[$i]->setCantidadMaxPasajeros($pasajerosViaje1);
                    echo "****************************************** \n";
                }
                $i++;
            }
        break;
        case 3: 
            $buscaViaje= true;
            $j=0;
            echo "****************************************** \n";
            echo "Ingrese el código del viaje en el que desea agregar un responsable: ";
            $codViajeGuardado=strtoupper(trim(fgets(STDIN)));
            while($j < count($viajesRealizados) && $buscaViaje){
                $codigoBuscado=$viajesRealizados[$j]->getCodigo();
                if($codViajeGuardado == $codigoBuscado){
                    $buscaViaje= false;
                    if($objResViaje == null){
                        echo "ingrese nombre del nuevo responsable: ";
                        $nombreResponsableV=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese apellido del responsable: ";
                        $apellidoResponsableV=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese numero de empleado del responsable: ";
                        $numEmpleadoV=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese numero de licencia del responsable: ";
                        $numlicenciaV=strtoupper(trim(fgets(STDIN)));
                        echo "****************************************** \n";
                        $responsableCargo= new ResponsableV($nombreResponsableV, $apellidoResponsableV, $numEmpleadoV, $numlicenciaV);
                        $viajesRealizados[$j]->setObjResponsableV($responsableCargo);
                    }
                    else{
                        echo "Ya existe un responsable a cargo";
                        echo "****************************************** \n";
                    }
                }
                else{
                    $p++;
                }
            }
        break;
        case 4: 
            $buscandoViaje= true;
            $p=0;
            echo "****************************************** \n";
            echo "Ingrese el código del viaje en el que desea agregar un pasajero: ";
            $codigoViajeGuardado=strtoupper(trim(fgets(STDIN)));
            while($p < count($viajesRealizados) && $buscandoViaje){
                $codigoBuscado=$viajesRealizados[$p]->getCodigo();
                if($codigoViajeGuardado == $codigoBuscado){
                    $buscandoViaje= false;
                    $pasajerosGuardados=$viajesRealizados[$p]->getCantidadMaxPasajeros();
                    $coleccionPasajerosGuardados=$viajesRealizados[$p]->getColeccionPasajeros();
                    
                    if($pasajerosGuardados >= count($coleccionPasajerosGuardados)){
                        echo "ingrese nombre de nuevo pasajero: ";
                        $nombrePasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese apellido de pasajero: ";
                        $apellidoPasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese telefono de pasajero: ";
                        $telefonoPasajero=strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese documento de pasajero: ";
                        $numeroDocumento=strtoupper(trim(fgets(STDIN)));
                        echo "****************************************** \n";
                        $pasajero= new Pasajeros($nombrePasajero, $apellidoPasajero, $telefonoPasajero, $numeroDocumento);
                        $viajesRealizados[$p]->agregarPasajeros($pasajero);
                    }
                    else{
                        echo "No hay más lugares disponibles en este viaje";
                        echo "****************************************** \n";
                    }
                }
                else{
                    $p++;
                }
            }
        break;
        case 5: 
            echo "****************************************** \n";
            echo "Ingrese el documento de la persona cuyos datos quiera modificar: ";
            $dniPasajeroPrevio=strtoupper(trim(fgets(STDIN)));
            $listaDePasajeros= $viajeEjemplo->getColeccionPasajeros();
            //BUSCA SI EL PASAJERO EXISTE
            $posColPasajero= $viajeEjemplo->buscarPasajero($dniPasajeroPrevio);
            if($posColPasajero== -1){
                 echo "No se encontró al pasajero";
            }
            else{
            echo "ingrese nuevamente el nombre del pasajero: ";
            $nombrePasajero1=strtoupper(trim(fgets(STDIN)));
            echo "Ingrese nuevamente el apellido del pasajero: ";
            $apellidoPasajero1=strtoupper(trim(fgets(STDIN)));
            echo "Ingrese nuevamente el telefono del pasajero: ";
            $telefonoPasajero1=strtoupper(trim(fgets(STDIN)));
            echo "Ingrese nuevamente el DNI del pasajero: ";
            $dniPasajeroNuevo=strtoupper(trim(fgets(STDIN)));
            echo "****************************************** \n";
            
            $viajeEjemplo->modificarPasajero($posColPasajero, $nombrePasajero1, $apellidoPasajero1, $telefonoPasajero1);
            echo "Los datos se modificaron con exito";
            echo $viajeEjemplo;
            }
            
            //Modificar datos de un pasajero (VIEJO QUE HABIA CREADO)
            /* $buscar= true;
             * $i=0;
             * $pasajeros=$pasajerosRegistrados;
             * echo "****************************************** \n";
             * echo "Ingrese el documento de la persona cuyo nombre,  * apellido y/o telefono quiera modificar: ";
             * $documentoPasajero1=strtoupper(trim(fgets(STDIN)));
             * while($i < count($pasajerosRegistrados) && $buscar){
             *     $documentoEncontrar=$pasajerosRegistrados[$i]->getDocumento();
             *     if($documentoEncontrar == $documentoPasajero1){
             *         $buscar= false;
             *         echo "ingrese nuevamente el nombre del pasajero: ";
             *         $nombrePasajero1=strtoupper(trim(fgets(STDIN)));
             *         $pasajerosRegistrados[$i]->setNombre($nombrePasajero1);
             *         echo "Ingrese nuevamente el apellido del pasajero: ";
             *         $apellidoPasajero1=strtoupper(trim(fgets(STDIN)));
             *         $pasajerosRegistrados[$i]->setApellido($apellidoPasajero1);
             *         echo "Ingrese nuevamente el telefono del pasajero: ";
             *         $telefonoPasajero1=strtoupper(trim(fgets(STDIN)));
             *         $pasajerosRegistrados[$i]->setTelefono($telefonoPasajero1);
             *         echo "****************************************** \n";
             *      }
             *      $i++;
             * }
            */
        break;

        case 6: 
            echo "****************************************** \n";
            /**for ($i=0; $i < count($viajesRealizados); $i++){
                //$miViaje= $viajesRealizados[$i];
                echo $viajesRealizados[$i];
            }
            */
            $viajesRealizados; 
            $datosViajes="";
            foreach($viajesRealizados as $objViajes){
                //$viajesString=$viajes->__toString();
                $datosViajes=$datosViajes . "\n" . $objViajes . "\n";
        }
            echo $datosViajes;
            echo "****************************************** \n";
        break;
        case 7: 
            echo "****************************************** \n";
            echo "Clases creadas pero aún no implementadas \n";
            echo "****************************************** \n";
        break;
    }
} while (($opcion <= 7) && ($opcion >= 1));



//set son para setear nueva información modificando valores y get para obtenerlos (y guardarlos en una variable)

/**
$viaje1->setDestino("Brasil"); 
$codigoViaje1= $viaje1->getCodigo();
echo "El codigo del viaje 1 es: " . $codigoViaje1 . "\n";
$viaje1->setCantidadMaxPasajeros(5);
$pasajerosViaje= $viaje1->getCantidadMaxPasajeros();
echo "La cantidad de pasajeros del viaje 1 es: " . $pasajerosViaje
. "\n";

$codigoViaje2= $viaje2->getCodigo();
echo "El codigo del viaje 2 es: " . $codigoViaje2. "\n";
$viaje2->setCodigo("111");
echo "El codigo del viaje 2 es: " . $viaje2->getCodigo() . "\n";
echo "\n"; 
echo "Uso un echo sobre el objeto \n";
echo $viaje1 . "\n";
echo $viaje2;
*/
