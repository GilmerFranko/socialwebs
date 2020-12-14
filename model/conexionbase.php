<?php 
	require_once($_SERVER["DOCUMENT_ROOT"]."/model/configbase.php");
	class Conexion{
		protected $conexionBase;
		protected $pdo;
 		public function Conexion(){
			$this->conexionBase = new mysqli(DB_HOST, DB_USUARIO, DB_CLAVE, DB_NOMBRE);
			if ($this->conexionBase->connect_errno){
				echo "Fallo Al Conectar: " . $this->conexionBase->connect_errno;
				return;
			}else{
				//echo "funciono";
			}
			$this->conexionBase->set_charset(DB_CHARSET);
			$this->pdo = new PDO('mysql:dbname=bbdd_web;host=localhost;charset=utf8', DB_USUARIO,DB_CLAVE);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
 ?>