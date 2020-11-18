<?php
	$mailcorrecto=false;
	$email=$_GET['Email'];
	$conexion=mysqli_connect("localhost", "root", "");
	if (mysqli_connect_errno()){
		echo "fallo al conectar con la base de datos";
	}
	mysqli_select_db($conexion, "bbdd_web");
	mysqli_set_charset($conexion, "utf8");
	$sql = ("SELECT * FROM users  WHERE email='$email'") ;
	$Verifica=mysqli_query($conexion, $sql);
	if(mysqli_num_rows($Verifica)>0){//si existe al menos una fila
		echo "used";
	}
		else{
			if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@"))
    				{
      					if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          				//miro si tiene caracter .
         					 if (substr_count($email,".")>= 1){
            					 //obtengo la terminacion del dominio
            					$term_dom = substr(strrchr ($email, '.'),1);
            					//compruebo que la terminación del dominio sea correcta
            					if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
               						//compruebo que lo de antes del dominio sea correcto
               						 $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                					$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                					if ($caracter_ult != "@" && $caracter_ult != "."){
                						   $mailcorrecto = true;
                					}
                				}
                			}
                		}
               		}
               	}

    		if ($mailcorrecto){
       			echo "yes";
       		}
			if(!$mailcorrecto){
				echo "no";
					}
?>