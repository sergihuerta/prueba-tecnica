<?php

namespace app\controladores;
use \core\View;
use \app\modelo\usuarios;
use \app\entidades\usuario;


class controlusuarios {

	public function login() {

		View::set("mensaje", "");

		View::set("usuario", "");

		View::set("clave", "");

		View::render("formulario");

	} 

	public function autentificar() {

		$nombre = filter_input(INPUT_POST, "usuario");
		$clave = filter_input(INPUT_POST, "clave");


		$usuarioExistente = Usuarios::getByIdPassword($nombre, $clave);

		if ($usuarioExistente == null) {

			View::set("mensaje", "Usuario desconocido o clave incorrecta");

			View::set("usuario", $nombre);

            View::set("clave", $clave);

            View::render("formulario");

		} else {

			header("Location: ".DOMAIN."/controlusuarios/listar");


		}

	}

	public function listar() {

		$usuarios = Usuarios::getAll();

		View::set("users", $usuarios);

		View::render("lista");
		
	}

	public function ver($_nombre) {

		$usuario = Usuarios::getById($_nombre);

		View::set("user", $usuario);

		View::render("detalles");


	}

	public function nuevo() {

		View::set("mensaje", "");

		View::set("nombre", "");

		View::set("clave", "");

		View::render("nuevo");

	}

	public function insertar() {

		$nombre = filter_input(INPUT_POST, "usuario");

		$clave = filter_input(INPUT_POST, "clave");

		$usuarioExistente = Usuarios::getById($nombre);

		if ($usuarioExistente == NULL) {

			$nuevoUsuario = new Usuario($nombre, $clave);

			Usuarios::insert($nuevoUsuario);

			$this->listar();

		} else {

			View::set("mensaje", "Usuario ya existente");

			View::set("nombre", $nombre);

			View::set("clave", $clave);

			View::render("nuevo");


		}
		
	}

	public function actualizar() {

		$nombre = filter_input(INPUT_POST, "usuario");

		$clave = filter_input(INPUT_POST, "clave");

		$usuario = new Usuario($nombre, $clave);

		Usuarios::update($usuario);

		$this->listar();
	}

	public function eliminar() {

		$nombre = filter_input(INPUT_POST, "usuario");

		Usuarios::delete($nombre);

		$this->listar();
	}

}