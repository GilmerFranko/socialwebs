<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class viewtopostinprofile extends Conexion{
		public $devuelvefila;
		public function construc(){
			parent::__construct();
		}
		public function vtpip($minnumpage, $maxnumpage, $idowner){
			$sql = ("SELECT * FROM usersposts WHERE owner=$idowner ORDER BY id DESC LIMIT $minnumpage,$maxnumpage ") ;
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
	$data=new dataposts();
	//$data->getdataposts(); #enviarle como parametro el id del post que se mostrara
	$datauser=new dateprofile(); #los datos del usuario
	$datauser->getdateprofile($_SESSION['id']);
	$datauserpost=new dateprofile();
	$datauserpost->getdateprofile($data->owner);
	$viewtopostinprofile=new viewtopostinprofile();
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
		if(strlen($page[$x][2])>=320){ //si el parrafo pasa los n numeros de caracteres lo corta
			$page[$x][2]=substr($page[$x][2],0,320);
			$page[$x][2]=$page[$x][2] . "... <a href='#' class='enlacessincolor'>Ver mas</a>";
                					
		}
 ?>
 <tr class="trpostprofile">
	<td>
		<table width="100%" align="center" style="background-color: whitesmoke"  class="posttable">
			<tr>
				<td width="30%">
					<img src="/src/img/backgrounds/background2.jpg" alt="ejemplo" width="200px">
				</td>
				<td width="70%">
					<table width="100%">
						<tr>
							<td>
								<a href="/view/profile/viewtopost.php?idurlpost='<?php echo $page[$x][0]?>'" class="enlacesconcolor"><h3><?php echo $page[$x][1];?><!--title--></h3></a>
							</td>
						</tr>
						<tr>
							<td width="100%"><span><?php echo $page[$x][2];?></span></td>
						</tr>
						<tr>
							<td align="center">
								<div class="commentandreactions">
									<i class="ri-dislike-fill"></i><i class="ri-dislike-fill"></i><button>Comentar</button>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
<?php
	}//fin for
	
	}
	

 ?>
