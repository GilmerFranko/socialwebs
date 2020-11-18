	<?php 
		include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class login extends Conexion{
			public $hola;
			public function login(){
				parent::__construct();
			}
			public function checklogin(){
				$autenticado=true;
				echo "<div style='display: none;'>";
				$email=$_POST['email'];
				$password=$_POST['password'];
				echo "</div>";
				$sql = ("SELECT * FROM users WHERE email='$email'");
				$verifica=$this->conexionBase->query($sql);;
				if(mysqli_num_rows($verifica)>0){//si existe al menos una fila
					while($fila=$verifica->fetch_assoc()){//mientras exista recorra la fila
						if(password_verify($password,$fila['password'])){
							$id=$fila[0];
							session_start();
							$_SESSION['id']=$fila['id'];
							$autenticado=true;
							if (isset($_POST['saveuser'])){
								setcookie("SESSION", $_POST["usuario"], time()+ (60*60*24*5));//Cookie para recordar al usuario
							}
							header ("location: /index.php");
							echo "bien";
							die;

						}
					}
				}else{
					if (isset($usuario)){
						$this->hola="Usuario o Clave incorrectas";
					}
				}
				if($autenticado==false){
					if (isset($_COOKIE["SESSION"])){
						session_start();
						$_SESSION['usuario']=$_COOKIE["SESSION"];
						
						echo "mal";
						die;
					}
				}
				mysqli_close($this->conexionBase);
			}

			public function hola(){
				echo "<p id='fontsmall' style='color:red'>$this->hola</p>";
			}
		}
/*
				$usuario=$_POST['usuario'];
				$password=$_POST['password'];
				echo $usuario;
				$conexion=mysqli_connect("localhost", "root", "");
				if (mysqli_connect_errno()){
					echo "fallo al conectar con la base de datos";
				}
				mysqli_select_db($conexion, "usuarios");
				mysqli_set_charset($conexion, "utf8");
					$sql=("SELECT * FROM login where Usuario = '?' ");
					$resultado=mysqli_prepare($conexion, $sql);
					$ok=mysqli_stmt_bind_param($resultado, "s", $usuario);
					$ok=mysqli_stmt_execute($resultado);
					$num=mysqli_stmt_num_rows($resultado);
					echo $num;
*/

				

?>
