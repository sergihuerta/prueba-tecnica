<?php

namespace Core;


class View {

	protected static $data;


	public static function render($template) {

		//Ruta a fichero plantilla

		$fichero_plantilla = "../app/vistas/" . $template . ".php";

		//Comprobación existencia plantilla

		if (!file_exists($fichero_plantilla)) {

			throw new \Exception ("Error: La plantilla ". $fichero_plantilla . " no existe", 1);
		}


		ob_start(); // Inicio restriccion buffer de salida

            if( self::$data != NULL ) extract(self::$data);

            include( $fichero_plantilla );

            $html_resultante = ob_get_contents();

         ob_end_clean(); // Fin restriccion buffer de salida

         // Emision página de resultados
         echo $html_resultante;

    }

   // Registrar datos para ser proyectados por una plantilla
   public static function set($variable, $valor) {

      self::$data[$variable] = $valor;


   }

}