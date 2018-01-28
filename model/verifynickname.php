<?php 
	$Nickname=$_GET['Nickname'];
	$conexion=mysqli_connect("localhost", "root", "");
	if (mysqli_connect_errno()){
		echo "fallo al conectar con la base de datos";
	}
	mysqli_select_db($conexion, "bbdd_web");
	mysqli_set_charset($conexion, "utf8");
		$sql = ("SELECT * FROM users  WHERE nickname='$Nickname'") ;
		$Verifica=mysqli_query($conexion, $sql);
		if(mysqli_num_rows($Verifica)>0){//si existe al menos una fila
			echo "no";
		}
		else{
			echo "yes";
		}
?>