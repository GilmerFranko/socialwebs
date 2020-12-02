</body>
</html>
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
			background-color:#025a52;
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
			border-bottom-color: #00ccc1;
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
		.socialnets{<
			text-decoration:none;
			font-family:Verdana, Geneva, sans-serif;
			font-style:normal;
			font-size:48px;
		}
		.iconwhatsapp{
			color:green;
		}
		.stateverify{
			text-decoration:none;
			font-family:Verdana, Geneva, sans-serif;
			font-style:normal;
			font-size:38px;
			color:white;
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
		<table cellspacing="3" class="contain" width="100%">
			<table cellspacing="3" class="bar2" width="100%">
				<tr>
					<td><a href="/profile" class="enlaces2bar">Perfil</a></td>
					<td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
					<td><a href="#" class="enlaces2bar">Opiniones</a></td>
					<td><a href="profile/settings" class="enlaces2bar">Configuraciones</a></td>
				</tr>
			</table>
			<tr>
				<table cellpadding="0">
					<tr>
						<td width="30%">
							  <a href="/profile/websites/add" class="enlacesconcolor"> Agregar Pagina</a>
						        mis paginas agregadas
						        paginas que sigo
						        sugerencias
						        administrar paginas que tengo
						</td>
						<td width="100%">
							<table style="background-color:white;" width="100%">
								<tr>
									<td>
										<span>ID de usuario</span>
										<br>
										<span class="info"><?php echo $data->id;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<span>Nombre</span>
										<br>
										<span class="info"><?php echo $data->name;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<span>Nick</span>
										<br>
										<span class="info"><?php echo $data->nick;?></span>
									</td>

								</tr>
								<tr>
									<td>
										<span>Nick</span>
										<br>
										<span class="info"><?php echo $data->email;?></span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2"> Hola</td>
					</tr>
				</table>
			</tr>
		</table>
	</section>
</body>
</html>