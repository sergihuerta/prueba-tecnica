<?php

namespace app\Modelo;
use \core\Database;
use \app\entidades\usuario;


class Usuarios {


	public static function getAll() : array {

		$usuarios = [];

		try {

			$db = new Database;

			$sql = "SELECT * from usuarios";

			$query = $db->run($sql);

			//bucle y obtencion de resultados
			while( $reg = $query->fetch()) {

				//creacion de obj usuario por cada registro a matriz de resultados
				array_push($usuarios, new Usuario($reg['nombre'], $reg['clave']));
			}


			return $usuarios;


		} catch (\PDOException $e) {

			print "Error!: " . $e->getMessage();
		}
	}

	public static function getById($id) {

		try {

			$db = new Database;

			$sql = "SELECT * from usuarios WHERE nombre LIKE :nombre";

			$query = $db->run($sql, [':nombre' => $id]);

			$reg = $query->fetch();

			return ( ($reg !== false ) ? new Usuario($reg['nombre'], $reg['clave']) : NULL);


		} catch (\PDOException $e) {

			print "Error!; " . $e->getMessage();

		}


	}


	public static function getByIdPassword($id, $key) {

	    try {

	        $db = new Database;

	        $sql = "SELECT * from usuarios WHERE nombre LIKE :nombre AND clave LIKE :clave";

	        $query = $db->run($sql, [':nombre' => $id, ':clave' => $key]);

	        $reg = $query->fetch();

	        return ( ($reg !== false ) ? new Usuario($reg['nombre'], $reg['clave']): NULL);


	    } catch(\PDOException $e) {

	        print "Error!: " . $e->getMessage();

	    }

	}

	public static function insert(Usuario $user) {

		try {

			$db = new Database;

			$sql = "INSERT INTO usuarios (nombre, clave) VALUES (:nombre, :clave)";

			$query = $db->run($sql, [":nombre" => $user->nombre,
									":clave" => $user->clave]);

		} catch (\PDOException $e) {

	        print "Error!: " . $e->getMessage();

	    }

	}

	public static function update(Usuario $user) {

		try {

			$db = new Database;

			$sql = "UPDATE usuarios SET clave = :clave WHERE nombre = :nombre";

			$query = $db->run($sql, [':nombre' => $user->nombre,
									':clave' => $user->clave]);
			
		} catch(\PDOException $e) {

	        print "Error!: " . $e->getMessage();

	    }

	}

	public static function delete($id) {


		try {

			$db = new Database;

			$sql = "DELETE FROM usuarios WHERE nombre = :nombre";

			$query = $db->run($sql, [':nombre' => $id]);


		} catch (\PDOException $e) {

			print "Error!; " . $e->getMessage();


		}


	}

}