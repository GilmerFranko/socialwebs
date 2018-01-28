<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class viewtopostinprofile extends Conexion{
		public $devuelvefila;
		public function construc(){
			parent::__construct();
		}
		public function vtpip($minnumpage, $maxnumpage, $idowner){
			$sql = ("SELECT * FROM usersposts WHERE userid=$idowner ORDER BY id DESC LIMIT $minnumpage,$maxnumpage ") ;
			$resultado=$this->conexionBase->query($sql);
			if ($resultado){
				if(mysqli_num_rows($resultado)>0){//si existe al menos una 
					$a=0;
					while($fila=$resultado->fetch_row()){//mientras exista recorra la fila
						$this->devuelvefila[$a] =$fila;
						$a++;
					}
				}
				return $this->devuelvefila;
			}else{
				echo "without result";
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
<?php

    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/getdatapost.php");#incluir dateprofile
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/getsetlikes.php");#ñp incluyo para poder ver los likes de los post dateprofile
	$data=new dataposts();
	//$data->getdataposts(); #enviarle como parametro el id del post que se mostrara
	$datauser=new dateprofile(); #los datos del usuario
	$datauser->getdateprofile($_SESSION['id']);
	$datauserpost=new dateprofile();
	$datauserpost->getdateprofile($data->userid);
	$viewtopostinprofile=new viewtopostinprofile();
	$getsetlikes= new getsetlikes()
?>
<?php
	$pasa=true;
	$end="end";
	$boo=0;
	$urlpage = $_GET['urlpage'];#mediante la url se pasara el id del post a mostrar
	// Array de 50 elementos
	if ($urlpage==1){
		$position = 0;
		$pasa=true;
	}else{
		$position = ($urlpage-1)*5;
		$pasa=false;
	}
	$page=$viewtopostinprofile->vtpip($position,$position+5,$datauser->id);//carga los datos a $page
	for ($x=0; $x<5; $x++){
		if(empty($page[$x][0])){//rompe el bucle, evita que se creen publicaciones vacias
			$boo=$x;
			$end="end";
			$x=7;
			break;	
		}else{
			$end="";
		}
	}
	if($pasa==false){
		$page=$viewtopostinprofile->vtpip($position,$position+$boo,$datauser->id);
	}else{
		$boo=5;
	}
	/*if($end=="end"){//fin if
		echo "end";//para que el lado del cliente se fije que ya no hay publicaciones
		$end="";
	}*/
	for ($x=0; $x<$boo; $x++) {	
	if(!empty($page)){
	
		if(empty($page[$x][1])){//rompe el bucle, evita que se creen publicaciones vacias
			$x=6;
			return false;
		} 
		if(strlen($page[$x][3])>=320){ //si el parrafo pasa los n numeros de caracteres lo corta
			$page[$x][3]=substr($page[$x][3],0,320);
			$page[$x][3]=$page[$x][3] . "... <a href='#' class='enlacessincolor'>Ver mas</a>";
                					
		}
 ?>
 <div class="row">
 	<div class="col-lg-4">
		<a href="/view/profile/viewtopost.php?idurlpost='<?php echo $page[$x][0]?>'" class="enlacesconcolor"><h3><?php echo $page[$x][2];?><!--title--></h3></a>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<img src="/src/img/backgrounds/background2.jpg" alt="ejemplo" width="100%	">
	</div>
<div class="row">
	<div class="col-lg-4">
		<span><?php echo $page[$x][3];?></span>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="commentandreactions" width="100%" align="center">
			<i class="ri-dislike-fill ilike" id="<?php echo 'like'.$page[$x][0];?>" onclick="liked(<?php echo $page[$x][1];?>,<?php echo $page[$x][0]?>)">
						<!--con este script system podra saber que icono poner segun si es like o no-->
				<script>
					$(document).ready(function() {
						liked(<?php echo $page[$x][1];?>,<?php echo $page[$x][0]?>)
					});
				</script>
				<?php
				 	$getsetlikes->getnumlikesof($page[$x][1],$page[$x][0]);
					echo $getsetlikes->devuelvenumfila; 
				?>
						
				</i><!--imprime los like que lleva esta publicacion-->
				<i class="ri-dislike-line" id="unlike"></i><button>Comentar</button>
		</div>
	</div>
</div>

	

<?php
	}//fin for
	
	}
	

 ?>
