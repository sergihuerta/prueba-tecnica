<?php

// Ruta fisica absoluta de carpeta raiz del proyecto
define("PROJECTPATH", dirname(__DIR__));

//echo "PROJECTPATH:".PROJECTPATH."<br>";

// Ruta relativa carpeta raiz del proyecto
define('ROOT_DIR', '/prueba-tecnica/mvc');

// Ruta relativa a carpeta /public
define('DOMAIN', ROOT_DIR.'/public');

//echo "DOMAIN:".DOMAIN."<br>";

// Ruta relativa a carpeta /app/scripts
define('JS_SCRIPTS', ROOT_DIR.'/app/scripts');


//funcion de carga
function autoload_classes($class_name) {

     $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php';

     //echo "Nombre:".$filename."<br>";

     if(is_file($filename)) {

          include_once $filename;

     } else die("Clase $filename no encontrada.");

}

spl_autoload_register('autoload_classes');


//creacion del obj enrutador y ejecucion del controlador
use \core\App;
$app = new App;
$app->render(); 


?>