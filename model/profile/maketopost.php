<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class maketopost extends Conexion{
		public function construc(){
			parent::__construct();
		}
		public function setmaketopost(){
			$title=$_POST['titlepost'];
			$list=$_POST['listpost'];
			$userid=$_POST['userid'];
			$contentpost=$_POST['contentpost'];
			//falta agregar seguridad pero bueno vamos probando
			$sql = ("INSERT INTO usersposts(userid, title, content, likes, dislikes, comments, views, img, list) VALUES ($userid,'$title','$contentpost',0,0,0,0,'img', 1)") ;
			$resultado=$this->conexionBase->query($sql);
			if($resultado){
				$id=$this->conexionBase->insert_id;
				$sql = ("INSERT INTO likespost(userid, userpostid, likes, unlikes) VALUES ($userid, $id ,0,0)") ;
				$resultado=$this->conexionBase->query($sql);
				//echo "bien";
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