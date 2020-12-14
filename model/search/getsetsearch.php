<?php 
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class getsetsearch extends Conexion{
			public $devuelvefila;
		public function login(){
			parent::__construct();
		}
		public function getsearchsimple($minnumpage, $maxnumpage, $search){
			$pdo=$this->conexionBase;
			$stmt = $pdo->prepare("SELECT * FROM usersposts WHERE MATCH(title, content) AGAINST (?) ORDER BY likes DESC LIMIT ?,?");
			if (!$stmt->bind_param("sii", $search,$minnumpage,$maxnumpage)) {
    			echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
			}
			$stmt->execute();
			$result = $stmt->get_result();
			if ($stmt){
				if($result->num_rows>0){//si existe al menos una 
					$a=0;
					while($fila = $result->fetch_assoc()){//mientras exista recorra la fila
						$this->devuelvefila[$a] =$fila;
						$a++;
					}
					return $this->devuelvefila;
				}else{
					echo "none";
				}
			}else{
				echo "error";
			}
		}
	}
?>
<?php

    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/getdatapost.php");#devuelvedatos de publicacion
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#devuelve datos de usuario
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/getsetlikes.php");#ñp incluyo para poder ver los likes de los post dateprofile
	$data=new dataposts();
	//$data->getdataposts(); #enviarle como parametro el id del post que se mostrara
	$datauser=new dateprofile(); #los datos del usuario
	$datauser->getdateprofile($_SESSION['id']);
	$datauserpost=new dateprofile();
	$datauserpost->getdateprofile($data->userid);
	$getsetsearch=new getsetsearch();
	$getsetlikes= new getsetlikes();
	$search=$_GET['search'];
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
	$page=$getsetsearch->getsearchsimple($position,$position+5,$search);//carga los datos a $page
	for ($x=0; $x<5; $x++){
		if(empty($page[$x]['id'])){//rompe el bucle, evita que se creen publicaciones vacias
			$boo=$x;
			$end="end";
			$x=7;
			break;	
		}else{
			$end="";
		}
	}
	if($pasa==false){
		$page=$getsetsearch->getsearchsimple($position,$position+$boo,$search);
	}else{
		$boo=5;
	}
	/*if($end=="end"){//fin if
		echo "end";//para que el lado del cliente se fije que ya no hay publicaciones
		$end="";
	}*/
	for ($x=0; $x<$boo; $x++) {	
	if(!empty($page)){
	
		if(empty($page[$x]['userid'])){//rompe el bucle, evita que se creen publicaciones vacias
			$x=6;
			return false;
		} 
		if(strlen($page[$x]['content'])>=320){ //si el parrafo pasa los n numeros de caracteres lo corta
			$page[$x]['content']=substr($page[$x]['content'],0,320);
			$page[$x]['content']=$page[$x]['content'] . "... <a href='#' class='enlacessincolor'>Ver mas</a>";
                					
		}
	$datauser->getdateprofile($page[$x]['userid']);//carga los datos del usuario segun cada post
 ?><!--es mejor agregar aqui una clase que ejecute esto para poder heredarla de varios lugares-->
 <div class="row"><!--nombre y perfil-->
 	<div class="col-sm-2" style="background-color:var(--secondcolor);color:white; ">
        <a href="#" style="text-decoration: none; font-size: 16px;"><i class="ri-settings-5-fill"></i></a>
 	</div>
 	<div class="col-sm-8">
        <a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile"><?php echo $datauser->nickname; ?></a>
 	</div>
 	<div class="col-sm-2">
		<a href="#" class="butom, foticonprofile" style="background-color:var(--secondcolor);color:white;">
			<img src="<?php echo $datauser->pictureprofile; ?>"alt="perfil" width="50px">
		</a>
 	</div>
 </div>
 <div class="row">
 	<div class="col">
		<a href="/view/profile/viewtopost.php?idurlpost='<?php echo $page[$x]["id"]?>'" class="enlacesconcolor"><h3><?php echo $page[$x]['title'];?><!--title--></h3></a>
	</div>
</div>
<div class="row">
	<div class="col">
		<img src="/src/img/backgrounds/background2.jpg" alt="ejemplo" width="100%">
	</div>
</div>
<div class="row">
	<div class="col">
		<span><?php echo $page[$x]['content'];?></span><!--content-->
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="commentandreactions" width="100%" align="center">
			<i class="ri-dislike-fill ilike" id="<?php echo 'like'.$page[$x]['id'];?>" onclick="liked(<?php echo $page[$x]['userid'];?>,<?php echo $page[$x]['id']?>)">
						<!--con este script system podra saber que icono poner segun si es like o no-->
				<script>
					$(document).ready(function() {
						liked(<?php echo $page[$x]['userid'];?>,<?php echo $page[$x]['id']?>)
					});
				</script>
				<?php
				 	$getsetlikes->getnumlikesof($page[$x]['userid'],$page[$x]['id']);
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
