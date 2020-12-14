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
	<link rel="stylesheet" href="/src/bootstrap4/css/bootstrap.min.css">
	<script src="/view/script/jquery-3.4.1.min.js"></script>
	<script src="/view/script/getsetreactions.js"></script>
	<title>Perfil</title>
	<style>
		
	</style>
	<script>
		var pagina=1;
		$(document).ready(function() {
			cargardatos();	
		});
		function cargardatos(){
  			$.get("/view/profile/viewtopostinprofile.php?urlpage="+pagina,
   				function(data){
    				if (data != "" & data !="end") {
     					$(".beforeafter:last").before(data);
    				}
    				if (data == "end") {
    					$(".beforeafter:last").before("<span class='info'>Vaya... Ya no hay que mostrar!</span");
    				}
   			});				
		}
		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				pagina++;
				cargardatos();
			}					
		});
		function showinfoimg($urlimg){
			 $(function(){
		            var formData = new FormData($("#uploadimage")[0]);
		            var ruta = "imagen-ajax.php";
		            $.ajax({
		                url: ruta,
		                type: "POST",
		                data: formData,
		                contentType: false,
		                processData: false,
		                success: function(datos)
		                {
                    $("#respuesta").html(datos);
                }
            });
		       	});
			}

		
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
	if(!empty($_POST['titlepost']) and !empty($_POST['contentpost']) and !empty($_POST['userid'])){
		$maketopost->setmaketopost();
	}else{
		echo "string";
	}
	?>
	<section class="section" align="">
		<div class="container">
			<table cellspacing="3" class="containprofile" width="100%" border="0">
				<tr>
					<td>
						<table cellspacing="3" class="bar2" width="100%">
							<tr>
								<td><a href="#" class="enlaces2bar">Perfil</a></td>
								<td><input type="text" placeholder="Buscar en @<?php echo $data->nickname; ?>"></td>
								<td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
								<td><a href="/view/profile/opinions(prueba).php" class="enlaces2bar">Opiniones</a></td>
								<td><a href="#" class="enlaces2bar">Informacion</a></td>
								<td><a href="profile/settings" class="enlaces2bar">Mas</a></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<div class="row">
				<div class="col-sm-4" align="center">
					<div class="row">
						<div class="col-sm-12">
							<img class="photoprofile" src="<?php echo $data->pictureprofile;?>"alt="perfil" width="250px" onclick="showinfoimg(<?php echo $data->pictureprofile;?>)"/>
							<figcaption><?php echo '@'.$data->nickname;?></figcaption>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<a href="#" class="socialnets"><span class="ri-whatsapp-fill iconwhatsapp"></span></a>
						</div>
						<div class="col-sm-3">
							<a href="#" class="socialnets"><span class="ri-facebook-box-fill iconfacebook"></span></a>
						</div>
						<div class="col-sm-3">
							<a href="#" class="socialnets"><span class="ri-github-fill icongithub"></span></a>
						</div>
						<div class="col-sm-3">
							<a href="#" class="socialnets"><span class="ri-message-fill"></span></a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<form action="" id="formtopost" method="post">
								<span class="info">Title</span><br>
								<input type="text" name="titlepost" placeholder=""><br>
								<input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>"><br>
								<span class="info">Think it and Write it</span><br>
								<textarea name="contentpost" id="" cols="27" rows="10"></textarea><br>
								<input type="submit" value="Publicar	">
								<button>Adjuntar Archivos</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-8" align="center">
					<div class="row" style="" align="">
						<div class="col-sm-12" align="">
								<span class="beforeafter"></span>
						</div>
				</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>