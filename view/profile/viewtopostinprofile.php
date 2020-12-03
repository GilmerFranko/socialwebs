<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
	class viewtopostinprofile extends Conexion{
		public function construc(){
			parent::__construct();
		}
		public function vtpip($minnumpage, $maxnumpage){
			$sql = ("SELECT * FROM usersposts ORDER BY id DESC LIMIT $minnumpage,$maxnumpage") ;
			$resultado=$this->conexionBase->query($sql);
			if(mysqli_num_rows($resultado)>0){//si existe al menos una 
				$a=0;
				while($fila=$resultado->fetch_row()){//mientras exista recorra la fila
					$devuelvefila[$a] =$fila;
					$a++;
				}
			}
			return $devuelvefila;
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
	$urlpage = $_GET['urlpage'];#mediante la url se pasara el id del post a mostrar
	// Array de 50 elementos
	$mensajes = array('');
	// Devuelvo 10 elementos por página
	$position = ($urlpage-1)*5;
	$page=$viewtopostinprofile->vtpip(0,5);
	//echo $page[0/*columna*/][0/*fila*/];
	for ($x=0; $x<5; $x++) {
		
 ?>
<table width="100%" align="center" style="background-color: whitesmoke">
	<tr>
		<td>
			<img src="/src/img/backgrounds/background2.jpg" alt="ejemplo" width="200px">
		</td>
		<td>
			<table width="100%">
				<tr>
					<td>
						<a href="/view/profile/viewtopost.php?idurlpost=1" class="enlacesconcolor"><h3><?php echo $page[$x][1];?><!--title--></h3></a>
					</td>
				</tr>
				<tr>
					<td><span><?php echo $page[$x][2];?></span></td>
				</tr>
				<tr>
					<td style="background-color: var(--secondcolor)">
						<i class="ri-dislike-fill"></i><i class="ri-dislike-fill"></i><button>Comentar</button>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php } ?>
