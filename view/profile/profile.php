<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/favicon.ico" type="image/ico">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<link rel="stylesheet" href="/view/css/tablestyles.css">
	<link rel="stylesheet" href="/src/fonts/remixicon.css">
	<link rel="stylesheet" href="/view/css/csspageprofile.css">
	<script src="/view/script/jquery-3.4.1.min.js"></script>
	<title>Perfil</title>
	<style>
		
	</style>
	<script>
		var pagina=0;
		$(document).ready(function() {
			cargardatos();	
		});
		function cargardatos(){
  			$.get("/view/profile/viewtopostinprofile.php?urlpage="+pagina,
   				function(data){
    				if (data != "") {
     					$(".beforeafter:last").before(data); 
    			}
   			});				
		}
		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				pagina++;
				cargardatos();
			}					
		});
	</script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
    /*if (!empty($_GET['user'])){
    	header("location: /view/login.php");
    }*/
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/maketopost.php");#incluir dateprofile
	$data=new dateprofile();
	$data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
	$maketopost=new maketopost();
	if(!empty($_POST['titlepost']) and !empty($_POST['contentpost']) and !empty($_POST['owner'])){
		$maketopost->setmaketopost();
		echo "hola";
	}else{
		echo "string";
	}
	?>
	<section class="section" align="center">
		<table cellspacing="3" class="containprofile" width="100%" border="0">
			<tr>
				<td>
					<table cellspacing="3" class="bar2" width="100%">
						<tr>
							<td><a href="#" class="enlaces2bar">Perfil</a></td>
							<td><input type="text" placeholder="Buscar en este perfil"></td>
							<td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
							<td><a href="#" class="enlaces2bar">Opiniones</a></td>
							<td><a href="#" class="enlaces2bar">Informacion</a></td>
							<td><a href="profile/settings" class="enlaces2bar">Mas</a></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellpadding="0" width="100%">
						<tr>
							<td width="30%">
								<table class="prueba" cellpadding="0">
									<tr">
										<td>
											<div id="photoandverify">
												<img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="200px">
												<!--agg foto perfil-->
											</td>
											<td>
												<a href="#" class="stateverify">
													<i class="ri-whatsapp-fill">
													</a>
												</i>
												<br>
												<a href="#" class="stateverify">
													<i class="ri-facebook-box-fill stateverify">
														
													</i>
												</a>
												<br>
												<a href="#" class="stateverify">
													<i class="ri-twitter-fill stateverify" >
														
													</i>
												</a>
											</div>
										</td><!--agg las redes sociales-->
									</tr>
									<tr>
										<td>
											<a href="#" class="socialnets"><span class="ri-whatsapp-fill iconwhatsapp"></span></a>
											<a href="#" class="socialnets"><span class="ri-facebook-box-fill iconfacebook"></span></a>
											<a href="#" class="socialnets"><span class="ri-github-fill icongithub"></span></a>
										</td>
										<td>
											<i class="ri-messenger-fill"></i>
										</td>	
									</tr>	
								</table>
							</td>
							<td width="100%">
								<table style="background-color:white;" width="100%">
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
											<span>Web Fijada</span>
											<br>
											<span class="info"><?php echo $data->email;?></span>
										</td>
									</tr>
									<tr>
										<td>
											<span>Empresa</span>
											<br>
											<span class="info">DevJent</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="ri-information-line">Puedes observar nuestras publicaciones de una forma ordenada <a href="#">aquí</a></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table id="tableposts" width="100%">
									<tr>
										<td>
											<table id="tabletopost">
												<form action="" id="formtopost" method="post">
													<tr>
														<td>
															<span class="info">Titulo</span>
														</td>
													</tr>
														<tr>
															<td>
																<input type="text" name="titlepost" placeholder="">
																<input type="hidden" name="owner" value="<?php echo $_SESSION['id'];?>">
															</td>
														</tr>
														<tr>
															<td>
																<span class="info">Escribe tu post aqui</span>
															</td>
														</tr>
														<tr>
															<td>
																<textarea name="contentpost" id="" cols="30" rows="10"></textarea>
															</td>
														</tr>
														<tr>
															<td>
																<input type="submit" value="Publicar	">
																<button>Adjuntar Archivos</button>
															</td>

														</tr>
													</form>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<p class="info"> GilmerF ha hecho una nueva publicacion</p>
										</td>
									</tr>
										<td>
											<table width="100%" align="center" style="background-color: whitesmoke">
												<tr>
													<td>
														<img src="/src/img/backgrounds/background2.jpg" alt="ejemplo" width="200px">
													</td>
													<td>
														<table width="100%">
															<tr>
																<td>
																	<a href="/view/profile/viewtopost.php?idurlpost=1" class="enlacesconcolor"><h3>Nueva Version </h3></a>
																</td>
															</tr>
															<tr>
																<td>esta nueva version trae para ustedes mucho contenido</td>
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
											<tr class="beforeafter"></tr>
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