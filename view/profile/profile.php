<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<link rel="stylesheet" href="/view/css/tablestyles.css">
	<link rel="stylesheet" href="/src/fonts/remixicon.css">
	<title>Perfil</title>
	<style>
		.section{
			left:10%;
			position: absolute;
			width: 80%;
		}
		.bar2{
			background-color:black;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 16px;
			font-style: normal;
			text-align: center;
			border-top-width: medium;
			border-right-width: medium;
			border-bottom-width: medium;
			border-left-width: medium;
			border-top-style: none;
			border-right-style: none;
			border-bottom-style: solid;
			border-left-style: none;
			border-top-color: orange;
			border-right-color: orange;
			border-bottom-color: orange;
			border-left-color: orange;
			-webkit-transition: all .3s;
			-moz-transition: all .3s;
			-ms-transition: all .3s;
			-o-transition: all .3s;
			transition: all .3s;
			border-radius: 0px;
				}
		.enlaces2bar{
			color:white;
			text-decoration:none;
			font-family:Verdana, Geneva, sans-serif;
			font-style:normal;
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
	echo $data->pictureprofile;
	 ?>
	<section class="section" align="center">
		<table cellspacing="0" class="contain" width="100%">
			<table cellspacing="0" class="bar2" width="100%">
				<tr>
					<td><a href="#" class="enlaces2bar">Perfil</a></td>
					<td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
					<td><a href="#" class="enlaces2bar">Opiniones</a></td>
					<td><a href="profile/settings" class="enlaces2bar">Configuraciones</a></td>
				</tr>
			</table>
			<tr>
				<table cellspacing="0" width="100%">
					<tr>
						<td width="15%">
							<table>
								<tr>
									<td><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="120px"><!--agg foto perfil--></td><td><a href="#"><i class="ri-whatsapp-fill"></a></i><br><a href="#"><i class="ri-facebook-box-fill"></i></a><br><a href="#"><i class="ri-twitter-fill"></i></a></td><!--agg las redes sociales-->
								</tr>
							</table>
						</td>
						<td width="85%">
							<table cellspacing="0" cellspacing="0"style="background-color:white;" width="100%">
								<tr>
									<td>
										<p>ID de usuario</p>
										<p class="info"><?php echo $data->id;?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Nombre</p>
										<p class="info"><?php echo $data->name;?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Nick</p>
										<p class="info"><?php echo $data->nick;?></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Email</p>
										<p class="info"><?php echo $data->email;?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Contraseña</p>
										<p class="info"><?php echo password_verify($data->pass);?></p>
									</td>

								</tr>
							</table>
						</td>
					</tr>
				</table>
			</tr>
		</table>
	</section>
</body>
</html>