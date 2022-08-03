<?php

namespace app\entidades;

class Usuario {

	//Atributos
	public $nombre;
	public $clave;


	public function __construct($_nombre, $_clave) {

		$this->nombre = $_nombre;
		$this->clave = $_clave;
		
	}
}