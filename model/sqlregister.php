	<?php
		    include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class register extends Conexion{
			public $hola;
			public function register(){
				parent::__construct();

			}
			public function registeruser()
			{
				$mailcorrecto=false;
				$autenticado=false;
				$conexion=mysqli_connect("localhost", "root", "");
				mysqli_select_db($conexion, "usuarios");
				echo "<div style='display: none;'>";
				$name=$_POST['name'];
				$pass=$_POST['pass'];
				$email=$_POST['email'];
				$nickname=$_POST['nickname'];
				$pathpp=$_FILES['pictureprofile']['tmp_name'];
				$typepp=$_FILES['pictureprofile']['type'];
				$namepp=$_FILES['pictureprofile']['name'];
				$sizepp=$_FILES['pictureprofile']['size'];
				$passencripted=password_hash($pass, PASSWORD_DEFAULT);
				echo "</div>";
				$sql = ("SELECT * FROM users  WHERE nickname='$nickname'");//si existe un nickname usado al ingresado

				$verificanick=$this->conexionBase->query($sql);
				if(mysqli_num_rows($verificanick)>0){//si existe al menos una arrow
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
					if($_FILES['pictureprofile']['name']=='2'){
						$sql = ("SELECT * FROM users  WHERE email='$email'") ; //si existe un correo usado al ingresado
						$verificaemail=$this->conexionBase->query($sql);
						if(mysqli_num_rows($verificaemail)>0){//si existe al menos una arrow
						}
						else{
							$sql = ("INSERT INTO users(name, nickname, email, password) VALUES ('$name','$nickname','$email','$passencripted')") ;
							$check=$this->conexionBase->query($sql);
							if ($check)
							{
								echo "bien";
							}
							else
							{
								echo "mal";
							}
						}
					}else if(!empty($_FILES['pictureprofile']) and $typepp=="image/jpeg" or !empty($_FILES['pictureprofile']) and $typepp=="image/jpg" or !empty($_FILES['pictureprofile']) and $typepp=="image/png")
					{
						$typeextencion=str_replace("image/","",$typepp);
						$namepp="profile.".$typeextencion;
						if ($sizepp<=327680)
						{
							$sql = ("SELECT * FROM users  WHERE email='$email'") ; //si existe un correo usado al ingresado
							$verificaemail=$this->conexionBase->query($sql);
							if(mysqli_num_rows($verificaemail)>0){//si existe al menos una fila
							}
							else
							{
								$sql = ("INSERT INTO users(name, nickname, email, password) VALUES ('$name','$nickname','$email','$passencripted')") ;
								$check=$this->conexionBase->query($sql);
								if ($check)
								{
									$id=$this->conexionBase->insert_id;
									$sql = ("SELECT * FROM users  WHERE id='$id'") ; //si el ultimo id es diferente al nombre del usario ingresado entonces hay un error grandisimo que solucionar
									$verificao=$this->conexionBase->query($sql);
									if(mysqli_num_rows($verificao)>0){//si existe al menos una fila
										while($arrow=$verificao->fetch_assoc()){//mientras exista recorra la arrow
											if($name==$arrow['name']){
												$pathfolder=$_SERVER['DOCUMENT_ROOT']."/users/"."user".$arrow['id']."/";
												if(!mkdir($pathfolder, 0777, true)) {
													die('error created folder');
												}else{
													move_uploaded_file($_FILES['pictureprofile']['tmp_name'],$pathfolder.$namepp);
													$sql = ("UPDATE users SET pictureprofile='/users/user$arrow[id]/$namepp' WHERE id='$id'");
													$verificaid=$this->conexionBase->query($sql);
													if ($verificaid){

													}else
													{
														echo "nada";
													}
												}
											}
											else{
												("location: /index");
											}
										}
									}
								}
								else
								{
									echo "mal";
								}
							}
						}else{
							echo "img > 320kb:=". $sizepp;
						}
					}else{
						echo "eror";
					}
				}
			}
		}


?>