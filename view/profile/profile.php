<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<title>Perfil</title>
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
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	$data=new dateprofile();
	$data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
	 ?>
	<section class="section" align="center">
        Publicaciones
        Opiniones
        <a href="/view/profile/websites.php">Sitios Webs</a>
        Likes
        dislikes
        <a href="/view/profile/settings.php" class="enlacesconcolor">Configuraciones</a>
	</section>
</body>
</html>