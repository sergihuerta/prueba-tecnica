<?php

namespace Core;

use \Core\App;


class Database{

     private $_dbUser;
     private $_dbPassword;
     private $_dbHost;
     private $_dbName;
     private $_connection;

     public function __construct(){

         try {

         // Obtención parámetros de conexion de archivo configuracion
         $config = App::getConfig();
         $this->_dbHost = $config['host'];
         $this->_dbUser = $config['user'];
         $this->_dbPassword = $config['password'];
         $this->_dbName = $config['database'];


         // Conexion a base de datos
         $dburl = 'mysql:host='.$this->_dbHost.';dbname='.$this->_dbName;
         $this->_connection = new \PDO($dburl, $this->_dbUser, $this->_dbPassword);
         $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
         $this->_connection->exec("SET CHARACTER SET utf8");


        } catch (\PDOException $e){

            print "Error!: " . $e->getMessage();

         die();

        }
     }


     // Ejecucion de consulta parametrizada
     public function run($sql, $args = []){

         $stmt = $this->_connection->prepare($sql);
         $stmt->execute($args);
         return $stmt;

     }
     
}