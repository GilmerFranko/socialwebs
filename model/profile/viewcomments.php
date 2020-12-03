<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/Codigo/sql/ConexionBase.php");
	class mostrar_publicaciones extends Conexion{
		public function construc(){
			parent::__construct();
		}
		public function get_construct($filas,$columnas){
			$sql = ("SELECT * FROM publicaciones ORDER BY id DESC limit 5") ;
			$resultado=$this->conexionBase->query($sql);
			if(mysqli_num_rows($resultado)>0){//si existe al menos una 
				$a=0;
				while($fila=$resultado->fetch_row()){//mientras exista recorra la fila
					$devuelvefila[$a] =$fila;
					$a++;
				}
			}
			return $devuelvefila[$filas][$columnas];
		}
	}
	/*$sql = ("SELECT * FROM publicaciones ORDER BY id DESC limit 5") ;
	$conexion=mysqli_connect("localhost", "root", "","usuarios");
	$resultado=$conexion->query($sql);
	if(mysqli_num_rows($resultado)>0){//si existe al menos una fila
		$hl=0;
		while($fila=$resultado->fetch_row()){//mientras exista recorra la fila
			$hl++;
			$devuelvefila[$hl] =$fila;
		}
	}*/
 ?>