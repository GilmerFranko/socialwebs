<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<title>Configuraciones</title>
	<style>
		.section{
			left:10%;
			position: absolute;
			width: 80%;
		}
	</style>
</head>
<body>
	<?php 
	session_start();
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	$data=new dateprofile();
	$data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
	 ?>
	<section class="section" align="center">
		<div class="deploy">
			<h2 class="letraengris">Datos Personales</h2>
			<p>Nombre</p>
			<?php echo $data->name;?>
			<p>Nick</p>
			<?php echo $data->nick;?>
			<p>Correo Electronico</p>
			<?php echo $data->email;?>
			<p>Clave</p>
			<?php echo $data->pass;?>
			<h2>Sitios Web</h2>
		</div>
	</section>
</body>
</html>