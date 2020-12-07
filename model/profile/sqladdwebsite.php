<?php
include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class addwebsite extends Conexion{
			public $hola;
			public function addwebsite(){
				parent::__construct();

			}
			public function setaddwebsite($id){
				echo "<div style='display: none;'>";
				$name=$_POST['name'];
				$url=$_POST['url'];
				$urlhttps="https://".$url; //este es el que servira para las comprobaciones
                $image=$_POST['image'];
				$userid=$id;
				echo "</div>";
			   // Variable to check
				// Remover los caracteres ilegales de la url
				if(trim($urlhttps) == ''){
					echo 'url empty';
					return false;
				}else{
					if (!filter_var($urlhttps, FILTER_VALIDATE_URL)) {
						echo 'url invalid';
						return false;
					}
					if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}/i",$urlhttps)) {
						echo 'url invalid';
						return false;
					}else{
						$sql = ("SELECT * FROM websites  WHERE url='$url'");//si existe una url usada
						$verificanick=$this->conexionBase->query($sql);
						if(mysqli_num_rows($verificanick)>0){//si existe al menos una fila entonces la web esta usada
							//"web used";
						}else{//solo si no esta repetida
							try{
								switch($image){#comprueba si el usuario agrego una imagen
									case null: $sql = ("INSERT INTO websites(userid, name, url , likes, dislikes) VALUES ($userid,'$name','$url', 0, 0)"); break;
									case !null:$sql = ("INSERT INTO websites(userid, name, url ,image, likes, dislikes) VALUES ($userid,'$name','$url','$image', 0, 0)"); break;
								}
								$verifica=$this->conexionBase->query($sql);
								if ($verifica){
									echo "web added";
								}else{
									echo "no agg";
								}
							}
						catch(ERROR $e){
							echo "error";
						}
					}
						return true;
					}
				}
            }
		}

?>
<?php
if (!empty($_POST['option'])){
if (!empty($_POST['url']) and $_POST['option']=="1"){
	$url=$_POST['url'];
	$conexion=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conexion, "bbdd_web");
	$sql = ("SELECT * FROM websites  WHERE url='$url'");//si existe una url usada
	$verifica=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($verifica)>0){//si existe al menos una fila entonces la web esta usada
		echo "web used";
	}else{
			if(trim($url) == ''){
				echo 'url empty';
				return false;
			}else{
				if (!filter_var($url, FILTER_VALIDATE_URL)) {
					echo 'url invalid';
					return false;
				}
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}/i",$url)) {
					echo 'url invalid';
					return false;
				}else{
					echo 'url valid';
					return true;
				}
			}
		}

}
if (!empty($_POST['url']) and $_POST['option']=="2"){
	$url=$_POST['url'];
	$conexion=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conexion, "bbdd_web");
	$sql = ("SELECT * FROM websites  WHERE url='$url'");//si existe una url usada
	$verifica=mysqli_query($conexion,$sql);
	$sql = ("INSERT INTO websites(userid, name, url , likes, dislikes) VALUES ($userid,'$name',$url, 0, 0)");
	$verifica=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($verifica)>0){//si existe al menos una fila entonces la web esta usada
		echo "web used";
	}else{
			if(trim($url) == ''){
				echo 'url empty';
				return false;
			}else{
				if (!filter_var($url, FILTER_VALIDATE_URL)) {
					echo 'url invalid';
					return false;
				}
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}/i",$url)) {
					echo 'url invalid';
					return false;
				}else{
					echo 'url added';
					return true;
				}
			}
		}

}
}
?>