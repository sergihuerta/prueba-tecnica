<?php

namespace Core;

class App {

     private $url = ""; // matriz con valores de URL
     private $controlador = "controlusuarios"; // controlador
     private $metodo = "login"; // metodo
     private $parametros = []; // parámetros
     private $obj_controlador = null; // objeto controlador

     // Obtencion de parámetros globales del archivo de configuracion
     public static function getConfig() {

        return parse_ini_file(PROJECTPATH . '/App/config/config.ini');

     }


     // Procesado de la URL para obtener una matriz con valores separados.
     private function parseUrl(){

        if(isset($_GET["url"])) {

            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));

        }
     } 


    public function __construct(){

         // Obtencion de la matriz de valore de la URL recibida
         $this->url = $this->parseUrl();

         // Obtencion de controlador, metodo y parámetros ( si hay )
         if ($this->url != null){

             if (isset( $this->url[0])) $this->controlador = $this->url[0];
             if (isset( $this->url[1])) $this->metodo = $this->url[1];
             if (isset( $this->url[2])) $this->parametros = array_slice($this->url, 2);
        }


         // Existe el controlador requerido¿?
         if ( !file_exists("../app/controladores/".ucfirst($this->controlador).".php")) {

                throw new \Exception("Error: El controlador ".$this->controlador." no existe", 1);

         }


         // Instanciacion del objeto de la clase controlador requerida.
         $clase = "\App\Controladores\\".$this->controlador;

        $this->obj_controlador = new $clase();


         // Existe el método requerido en el controlador ¿?
         if ( !method_exists($this->obj_controlador, $this->metodo )) {

            throw new \Exception("Error: El método ".$this->metodo." del controlador ".$this->controlador." no existe", 1);

         }
    }


     // Ejecucion de la peticion llamando al método del controlados requeridos
     public function render(){

            call_user_func_array([$this->obj_controlador, $this->metodo], $this->parametros);

     }
} 