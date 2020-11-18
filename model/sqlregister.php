	<?php 
		    include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class register extends Conexion{
			public $hola;
			public function register(){
				parent::__construct();

			}
			public function registeruser(){
				$mailcorrecto=false;
				$autenticado=false;
				$conexion=mysqli_connect("localhost", "root", "");
				mysqli_select_db($conexion, "usuarios");
				echo "<div style='display: none;'>";
				$name=$_POST['name'];
				$pass=$_POST['pass'];
				$email=$_POST['email'];
				$nickname=$_POST['nickname'];
				$passencripted=password_hash($pass, PASSWORD_DEFAULT);
				echo "</div>";
				$sql = ("SELECT * FROM users  WHERE nickname='$nickname'");//si existe un nickname usado al ingresado

				$verificanick=$this->conexionBase->query($sql);
				if(mysqli_num_rows($verificanick)>0){//si existe al menos una fila
					
					}
				else
				{
   					 //valida email
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
       			$sql = ("SELECT * FROM users  WHERE email='$email'") ; //si existe un correo usado al ingresado
				$verificaemail=$this->conexionBase->query($sql);
				if(mysqli_num_rows($verificaemail)>0){//si existe al menos una fila
				}
				else{
					$sql = ("INSERT INTO users(name, nickname, email, password) VALUES ('$name','$nickname','$email','$passencripted')") ;
					$check=$this->conexionBase->query($sql);
					if ($check){
						echo "bien";	
					}
					else{
						echo "mal";
						}
					}
				}
			
			}
		}

?>