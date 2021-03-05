<?php

#EN EL INDEX mostraremos la salida de las vistas al usuario y tambien a travez de el enviaremos las distintas acciones que el usuario envie al controlador.

#require establece que el codigo del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa. Por ellom si el archivo especificado en la funcion require() no se encuentra saltará un error "PHP Fatal error" y el programa PHP se detendrá.

#require_once funciona de la misma forma que sus respectivo, salvo quem al utilizar la version _once, s impide la carga de un mismo archivo mas de una vez.
#si requerimos el mimso codifo mas de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases.

require_once "Controladores/plantilla.controlador.php";
require_once "Controladores/formularios.controlador.php";
require_once "Modelos/formularios.modelo.php";

$plantilla = new controladorPlantilla();
$plantilla -> ctrTraerPlantilla();


?>