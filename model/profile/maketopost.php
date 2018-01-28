<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class maketopost extends Conexion{
		public function construc(){
			parent::__construct();
		}
		public function setmaketopost(){
			$title=$_POST['titlepost'];
			$list=$_POST['listpost'];
			$owner=$_POST['owner'];
			$contentpost=$_POST['contentpost'];
			//falta agregar seguridad pero bueno vamos probando
			$sql = ("INSERT INTO usersposts(title, content, owner, likes, dislikes, comments, views, img, list) VALUES ('$title','$contentpost',$owner,0,0,0,0,'img', 1)") ;
			$resultado=$this->conexionBase->query($sql);
			if($resultado){
				echo "bien";
			}else{
				echo "error";
			}
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